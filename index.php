<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCSICT Website</title>
    <link rel="icon" type="ccsictlogo.jpg">
</head>
<body>
  <style>
html, body {
    background: #efefef;
    height: 100%;
    margin: 0;
}

#center-text {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            padding: 0 20px;
            background-color: #538658;
            color: white;
        }
        #center-text h2 {
            margin: 0;
          }
          #logo-left,
        #logo-right {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        #logo-right {
            order: 3; /* Adjust the order to change its position */
        }

#chat-circle {
    position: fixed;
    bottom: 50px;
    right: 50px;
    background: #54566d63;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    color: white;
    padding: 15px;
    cursor: pointer;
    box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    transition: opacity 0.5s ease, backdrop-filter 0.5s ease;
    backdrop-filter: blur(0);
}
#chat-circle:hover {
    opacity: 0.7;
    backdrop-filter: blur(10px); 
}

.btn#my-btn {
    background: white;
    padding-top: 13px;
    padding-bottom: 12px;
    border-radius: 45px;
    padding-right: 40px;
    padding-left: 40px;
    color: #5865C3;
}

#chat-overlay {
    background: rgba(255, 255, 255, 0.1);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    display: none;
}

.chat-box {
    display: none;
    background: #efefef;
    position: fixed;
    right: 30px;
    bottom: 50px;
    width: 350px;
    max-width: 85vw;
    max-height: 100vh;
    border-radius: 5px;
    box-shadow: 0px 5px 35px 9px #8d8d8d;
}

.chat-box-toggle {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
.chat-box-toggle b {
    font-size: 20px;
    color: rgb(255, 196, 196);
}

.chat-box-header {
    background: #538658;
    height: 70px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    color: white;
    text-align: center;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}



.chat-box-body {
    position: relative;
    max-height: calc(100% - 70px); /* Adjust the height accordingly (total height - chat-box-header height) */
    border: 1px solid #ccc;
    overflow: hidden;
}

.chat-box-body:after {
    content: "";
    background-image: url("received_1512218956286166.jpeg");
    opacity: 0.1;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    height: 100%;
    position: absolute;
    z-index: -1;
}

#chat-input {
    background: #f4f7f9;
    width: 100%;
    position: relative;
    height: 47px;
    padding-top: 10px;
    padding-right: 50px;
    padding-bottom: 10px;
    padding-left: 15px;
    border: none;
    resize: none;
    outline: none;
    border: 1px solid #ccc;
    color: #0e0c0c;
    border-top: none;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    overflow: hidden;
}

.chat-input>form {
    margin-bottom: 0;
}

#chat-input::-webkit-input-placeholder {
    color: #ccc;
}

#chat-input::-moz-placeholder {
    color: #ccc;
}

#chat-input:-ms-input-placeholder {
    color: #ccc;
}

#chat-input:-moz-placeholder {
    color: #ccc;
}

.chat-submit {
    position: absolute;
    bottom: 3px;
    right: 10px;
    background: transparent;
    box-shadow: none;
    border: none;
    border-radius: 50%;
    color: #282835;
    width: 35px;
    height: 35px;
}

.chat-logs {
    padding: 15px;
    height: 370px;
    max-height: 100%;
    overflow-y: scroll;
}

.chat-logs::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    background-color: #F5F5F5;
}

.chat-logs::-webkit-scrollbar {
    width: 5px;
    background-color: #F5F5F5;
}

.chat-logs::-webkit-scrollbar-thumb {
    background-color: #434347;
}

@media only screen and (max-width: 500px) {
    .chat-logs {
        height: 40vh;
    }
}

.chat-msg.user>.msg-avatar img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    float: left;
    width: 15%;
}

.chat-msg.self>.msg-avatar img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    float: right;
    width: 15%;
}

.cm-msg-text {
    background: rgb(201, 198, 198);
    padding: 10px 15px 10px 15px;
    color: #0e0c0c;
    max-width: 75%;
    float: left;
    margin-left: 10px;
    position: relative;
    margin-bottom: 20px;
    border-radius: 30px;
}

.chat-msg {
    clear: both;
}

.chat-msg.self>.cm-msg-text {
    float: right;
    margin-right: 10px;
    background: hsl(126, 24%, 43%);
    color: white;
}

.cm-msg-button>ul>li {
    list-style: none;
    float: left;
    width: 50%;
}

.cm-msg-button {
    clear: both;
    margin-bottom: 70px;
}

    </style>

<div id="center-text">
    <img src="isulogo.jpg" alt="Left Logo" id="logo-left">
        <h2>College of Computing Studies, Information and Communication Technology</h2>
        <img src="ccsictlogo.jpg" alt="Right Logo" id="logo-right">

<div id="body"> 
  <div id="chat-circle" class="btn btn-raised">
      <div id="chat-overlay"></div>
      <img src="received_1512218956286166.jpeg" alt="Chatbot Image" style="width: 100%; height: 100%; border-radius: 50%;">  </div>

  <div class="chat-box">
    <div class="chat-box-header">
    <img src= "received_1512218956286166.jpeg" alt="Bob's Image" style="width: 60px; height: 60px; border-radius: 50%; margin-right: 10px;">      BOB <span style="font-size: 14px;">(Brainy online Buddy)</span>
      <span class="chat-box-toggle"><b class="material-icons">X</b></span>
  </div>
  
      <div class="chat-box-body">
          <div class="chat-box-overlay"></div>
          <div class="chat-logs" id="message-section">
            <!-- Initial chatbot message -->
            <div class="chat-msg bot">
                <div class="cm-msg-text">
                    Hello there! I'm Bob, your go-to guide for all things about enrollment, CCSICT programs, and the university's upcoming events. Feel free to drop any questions—I'm here to help!
                </div>
            </div>
        </div>
              </div>
      <div class="chat-input">      
          <form>
              <input type="text" id="chat-input" placeholder="Send a message...">
              <button type="button" class="chat-submit" id="chat-submit"><b class="material-icons">SEND</b></button>
          </form>      
      </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(function () {
            let offensiveWordCount = 0;
            let isBanned = false;

            $("#chat-submit").click(function (e) {
                e.preventDefault();
                const userMessage = $("#chat-input").val().trim();
                if (userMessage === '') {
                    return false;
                }

                // Display user message
                displayMessage(userMessage, 'self');

                // Simulate chatbot response (replace this with actual chatbot API call)
                simulateChatbotResponse(userMessage);

                // Optionally, you can clear the user input after receiving a response
                $("#chat-input").val('');

                // Scroll to the bottom of the chatbox to show the latest message
                scrollChatToBottom();
            });

            function displayMessage(message, type) {
                const mainDiv = $(".chat-logs");
                const INDEX = mainDiv.children().length + 1;

                // Create a div for the message
                let str = `<div id='cm-msg-${INDEX}' class="chat-msg ${type}">`;
                str += `  <div class="cm-msg-text">${message}</div>`;
                str += '</div>';
                mainDiv.append(str);

                $(`#cm-msg-${INDEX}`).hide().fadeIn(300);

                if (type === 'self') {
                    $("#chat-input").val('');
                }
            }

            function simulateChatbotResponse(userMessage) {
            const apiUrl = 'https://1aa5-180-191-16-79.ngrok-free.app/chatbot';

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ user_input: userMessage }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // Check if the JSON response has the expected structure
        if (data && data.hasOwnProperty('response')) {
            // Display chatbot response
            displayMessage(data.response, 'bot');

            // Check for offensive warning and update count
            if (data.response.includes('Warning: The use of offensive language is strictly prohibited. Kindly avoid using inappropriate words to maintain a respectful environment. Repeated violations may result in a temporary ban.')) {
                offensiveWordCount++;

                // Disable chat input if warning count reaches 3
                if (offensiveWordCount >= 3) {
                    disableChatInput();
                }
            }

            // Scroll to the bottom of the chatbox to show the latest message
            scrollChatToBottom();
        } else {
            console.error('Invalid JSON response structure:', data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}



function disableChatInput() {
    const chatInput = $("#chat-input");

    // Change the background color to red
    chatInput.css('background-color', '#E22030');
    chatInput.prop('disabled', true);

    // Schedule re-enabling after 30 minutes (1800000 milliseconds)
    // 20000 for 20 secs
    setTimeout(() => {
        // Change the background color back to normal
        chatInput.css('background-color', '');
        
        // Re-enable the chat input
        chatInput.prop('disabled', false);

        // Reset warning count
        offensiveWordCount = 0;
    }, 20000);
}



            $("#chat-circle").click(function () {
                $(".chat-box").fadeIn(500); // duration for fade in
            });

            $(".chat-box-toggle").click(function () {
                $(".chat-box").fadeOut(500); // duration for fadeout
            });

            $("#chat-input").keypress(function (e) {
                if (e.which === 13) {
                    // 13 is the key code for Enter
                    e.preventDefault();
                    $("#chat-submit").click();
                }
            });
        });
    </script>

</body>
</html>
