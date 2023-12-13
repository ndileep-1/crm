<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>CRM Project using PHP and MySQL</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

    <!-- Chatbot styles -->
    <style>
        /* Chatbot button styling */
        #chatbot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #512DA8;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 9999;
        }

        /* Chatbot chat container styling */
        #chat-container {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            z-index: 9998;
        }

        #chat-container .card-title {
            text-align: center;
            margin-bottom: 10px;
        }

        #chat-messages {
            max-height: 200px;
            overflow-y: auto;
            padding: 10px;
        }

        #user-input {
            width: 100%;
            padding: 10px;
            border: none;
        }

        #send-button {
            display: block;
            background-color: #512DA8;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 0 0 5px 5px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>


<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color:#512DA8">
        <div class="container">
          <a class="navbar-brand" href="#">CRM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">User Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">User Log In</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admin/">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="jumbotron text-white mt-5 mb-0" style="background-color:#9575CD">
        <div class="container">
            <div class="row">
                <div class="col-6 mt-5 col-sm-4">
                    <h4>Customer Relationship Management</h4>
                    The customer management system is about the customer requesting for query tickets and creating quotes
                    for the required services. The admin manages the tickets and quotes that are requested by the customer
                    . The admin manages the customer details and login details of the customer.
                </div>
                <div class="offset-2 col-4 col-sm-3 mt-5">
                    <a href="#"><img src="assets/img/logo.jpg" alt="logo" height="130" width="120" /></a>
                </div>
                <div class="col-12 col-sm-3 mt-4">
                    <a href="registration.php" class="btn btn-primary btn-xl rounded-pill mt-5 bg-lights">User
                        Signup</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Chatbot button -->
    <button id="chatbot-button">CRM Bot</button>

    <!-- Chatbot chat container -->
    <div id="chat-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">CRM Bot</h5>
                <div id="chat-messages"></div>
                <input type="text" id="user-input" placeholder="Type your message..." />
                <button id="send-button">Send</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5" style="background-color:#D1C4E9">
        <div class="container">
            <p class="m-1 text-center text-white small">Copyright &copy; SSV Team 2023</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for the chatbot -->
    <script>
        const chatbotButton = document.getElementById('chatbot-button');
        const chatContainer = document.getElementById('chat-container');
        const chatMessages = document.getElementById('chat-messages');
        const userInput = document.getElementById('user-input');
        const sendButton = document.getElementById('send-button');

        document.addEventListener('click', function(event) {
    var chatContainer = document.getElementById('chat-container');
    var chatbotButton = document.getElementById('chatbot-button');

    if (!chatContainer.contains(event.target) && !chatbotButton.contains(event.target)) {
        // Click occurred outside of the chat container and the chat button, hide the chat container
        chatContainer.style.display = 'none';
        chatbotButton.style.display = 'block';
    }
});

chatbotButton.addEventListener('click', function(event) {
    // Prevent the click event from propagating to the document
    event.stopPropagation();
    chatContainer.style.display = 'block';
    chatbotButton.style.display = 'none';
});

// Rest of your chatbot code...

// Function to append a message to the chat
function appendChatMessage(sender, message) {
    const messageElement = document.createElement('p');
    messageElement.textContent = `${sender}: ${message}`;
    chatMessages.appendChild(messageElement);
}

userInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      const userMessage = userInput.value.trim();
            if (userMessage === '') return;

            // Add user message to chat
            appendChatMessage('You', userMessage);
            userInput.value = '';

            // Simulate CRM Bot response
            const botResponse = getBotResponse(userMessage);
            setTimeout(() => {
                appendChatMessage('CRM Bot', botResponse);
            }, 500); // Simulate delay before bot responds (replace with actual CRM interaction)
        
    }
});
        chatbotButton.addEventListener('click', () => {
            chatContainer.style.display = 'block';
            chatbotButton.style.display = 'none';
        });

        sendButton.addEventListener('click', () => {
            const userMessage = userInput.value.trim();
            if (userMessage === '') return;

            // Add user message to chat
            appendChatMessage('You', userMessage);
            userInput.value = '';

            // Simulate CRM Bot response
            const botResponse = getBotResponse(userMessage);
            setTimeout(() => {
                appendChatMessage('CRM Bot', botResponse);
            }, 500); // Simulate delay before bot responds (replace with actual CRM interaction)
        });

        // Function to simulate CRM Bot response
        function getBotResponse(userMessage) {
    userMessage = userMessage.toLowerCase();
    let botResponse = '';

    if (userMessage.includes('hello') || userMessage.includes('hi')) {
        botResponse = 'Hello! How can I assist you today?';
    } else if (userMessage.includes('help')) {
        botResponse = 'You can inquire about distinctive feature-packed cars from Chevrolet, Audi, BMW, and Mitsubishi.';
    } 
    else if (userMessage.toLowerCase().indexOf('price') !== -1 || userMessage.toLowerCase().indexOf('pricing') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="You can visit our website and send your ticket to administrator for better pricing details";
    }
    else if (userMessage.toLowerCase().indexOf('trailblazer') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="Chevrolet has introduced the Trailblazer to rival the Toyota Fortuner and Ford Endeavour. This body-on-frame model has taken the place of the monocoque Chevrolet Captiva in GM India's lineup. For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('cruze') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="Chevrolet has revealed the power and fuel-efficiency figures of the new 1.6-litre Ecotec diesel motor of the upcoming second-generation Cruze. For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('sail') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The Chevrolet Sail is a subcompact car produced by SAIC-GM, a joint venture of General Motors in China. Launched in 2001, it was sold as the Buick Sail.For more information, please visit our website! ";
    }
    else if (userMessage.toLowerCase().indexOf('beat') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The Chevrolet Beat was a fuel-efficient subcompact car known for its distinctive design, spacious cabin, and urban-friendly size before it was discontinued in certain markets.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('enjoy') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The Chevrolet Enjoy was a compact MPV offering spacious interior, versatility, and affordability. It featured multiple seating configurations and practicality before its discontinuation.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('chevrolet') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="You can explore information about the Chevrolet Trailblazer, Cruze, Sail, Beat, and Enjoy in the Chevrolet lineup.";
    }
    else if (userMessage.toLowerCase().indexOf('r8') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The Audi R8 (Type 42) is the first generation of the R8 sports car developed and manufactured by German automobile manufacturer Audi. Conceived in 2003 in concept form, the R8 was put into production in June 2006. The Type 42 is based on the Lamborghini Gallardo and shares its chassis and engine.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('q7') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="Audi India has launched the petrol-powered Q7 40 TFSI in the country. The company has launched it in two trim levels - Premium Plus and Technology. While the former is priced at Rs 67.76 lakh, the latter will cost you Rs 74.43 lakh (both prices, ex-showroom). Both variants are powered by the same 2.0-litre, turbocharged petrol engine.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('rs7') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The RS 7 performance sportback features a bi-turbo 4.0-litre V8 that has been tweaked to produce 560PS and 700Nm of torque. The engine comes mated to an eight-speed automatic gearbox. The car is one of the most powerful models in Audi's range and has a 0-100kmph time of just 3.9 seconds.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('tt') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="German carmaker Audi has unveiled the RS version of its popular sports car, the TT, in both Coupe and Roadster versions in April 2016. The TT-RS features a 2.5-litre, five-cylinder turbocharged petrol motor that generates 400bhp and 480Nm of torque.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('a8') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The next generation of Audi's flagship sedan, the A8 was spotted testing in May 2016. The luxo-barge borrows heavily from the Prologue concept that was showcased at the 2016 Delhi Auto Expo.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('audi') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="You can explore information about the Audi R8, Q7, RS7,A8, TT Beat, and Enjoy in the Audi lineup.";
    }
    else if (userMessage.toLowerCase().indexOf('m4') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The BMW M4 is a four-seater coupe with two variants, starting at ₹ 1.44 crore in India. The M4 Competition is available in six colors and two versions, with a 510PS 3-liter straight-six petrol motor and all-wheel drivetrain. It can accelerate from 0 to 100kmph in 3.5 seconds and has an electronically limited top speed of 250kmph. The M4 has a fuel efficiency of about 10.8 KM/L. For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('x6') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="BMW X6 has been on sale in India since October 2015. Currently it is available on sale in two trim levels - xDrive40d M Sport and the X6 M. While the former is powered by a 3.0-litre turb-diesel (313PS/630Nm), the latter gets a turbocharged, 4.4-litre V8 which produces 575PS of power and 750Nm of torque.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('i8') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="BMW is currently working to launch a facelift for its i8 model by end 2017. The hybrid sports car will get upgrades in powertrain, chassis and overall design. While the current 1.5-litre turbo petrol mill coupled to an electric motor generates 362hp.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('x3') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="BMW is an iconic luxury car maker head-quartered in Germany, who has a large fleet of models in India. Recently it also added two new variants in its popular M series. Among those two, BMW M Series M3 Sedan is the four door variant, which is powered by a 3.0-litre petrol engine under the hood.For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('bmw') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="You can explore information about the BMW M4, X6, I8,X3 in the BMW lineup.";
    }
    else if (userMessage.toLowerCase().indexOf('cedia') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="Cedia is a model by Mitsubishi, blending style and performance. Introduced in 2000, it featured advanced technology and spacious interiors. Cedia, particularly the Lancer variant, was popular for its reliable engineering and comfort . For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('lancer') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The Mitsubishi Lancer Evolution, often referred to as the Evo, is an iconic high-performance sedan that gained fame for its rally-inspired design and exceptional handling. With powerful turbocharged engines, advanced all-wheel drive systems, and aggressive styling, the Evo series became synonymous with performance enthusiasts and motorsport aficionados. For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('montero') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="The Mitsubishi Montero, also known as the Pajero in some regions, is a robust and versatile SUV that has gained global recognition for its off-road capabilities and durability. First introduced in 1982, the Montero/Pajero became popular for its rugged design and reliable performance. For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('outlander') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="Outlander combines comfort, ample cargo space, and advanced safety features. The Outlander offers various engine options, including hybrid models, emphasizing fuel efficiency and eco-friendliness. For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('pajero') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="Mitsubishi Pajero Sport is a rugged and athletic SUV known for its off-road prowess and adventurous spirit. Introduced in 1996, it combines robust performance with a comfortable interior, making it a popular choice for both urban and off-road driving. For more information, please visit our website!";
    }
    else if (userMessage.toLowerCase().indexOf('mitsubishi') !== -1) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="You can explore information about the Mitsubishi cedia, lancer, montero,outlander, Pajero Sports in the Mitsubishi lineup.";
    }
    else if (userMessage.toLowerCase().indexOf('type') !== -1 || userMessage.toLowerCase().indexOf('car') !== -1 ||userMessage.toLowerCase().indexOf('model') !== -1 ) {
       // botResponse = 'To learn more about Chevrolet, ';
       botResponse ="You can inquire about distinctive feature-packed cars from Chevrolet, Audi, BMW, and Mitsubishi.";
    }

     else {
        botResponse = 'I\'m sorry, I didn\'t understand that. Please ask another question.';
    }

    return botResponse;
}



        // Function to append a message to the chat
        function appendChatMessage(sender, message) {
            const messageElement = document.createElement('p');
            messageElement.textContent = `${sender}: ${message}`;
            chatMessages.appendChild(messageElement);
        }

        
    </script>
</body>

</html>