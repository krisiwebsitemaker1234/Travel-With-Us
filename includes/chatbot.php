<!-- Chatbot -->
  <div class="chatbot">
    <div class="chatbot-btn" id="chatbotBtn">
      <i class="fas fa-comment"></i>
    </div>
    <div class="chatbot-window" id="chatbotWindow">
      <div class="chatbot-header">
        <h3>Travel Assistant</h3>
        <button id="closeChatbot"><i class="fas fa-times"></i></button>
      </div>
      <div class="chatbot-messages" id="chatbotMessages">
        <div class="message bot-message">
          Hi there! How can I help with your travel plans today?
        </div>
      </div>
      <div class="chatbot-input">
        <input type="text" placeholder="Type your message..." id="chatbotInput">
        <button id="sendMessage"><i class="fas fa-paper-plane"></i></button>
      </div>
    </div>
  </div>

  <style>
        /* Chatbot */
    .chatbot {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 1000;
    }

    .chatbot-btn {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--warning);
      color: var(--dark);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    .chatbot-btn:hover {
      transform: scale(1.1);
    }

    .chatbot-window {
      position: absolute;
      bottom: 70px;
      right: 0;
      width: 350px;
      height: 450px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
      display: none;
      flex-direction: column;
      overflow: hidden;
    }

    .chatbot-header {
      background: var(--primary);
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .chatbot-messages {
      flex: 1;
      padding: 15px;
      overflow-y: auto;
      background: #f8f9fa;
    }

    .message {
      margin-bottom: 15px;
      padding: 10px 15px;
      border-radius: 18px;
      max-width: 80%;
    }

    .user-message {
      background: var(--primary);
      color: white;
      margin-left: auto;
    }

    .bot-message {
      background: #e9ecef;
      color: #333;
    }

    .chatbot-input {
      display: flex;
      padding: 10px;
      background: white;
      border-top: 1px solid #dee2e6;
    }

    .chatbot-input input {
      flex: 1;
      padding: 10px 15px;
      border: 1px solid #ced4da;
      border-radius: 20px;
      margin-right: 10px;
    }

    .chatbot-input button {
      background: var(--primary);
      color: white;
      border: none;
      border-radius: 20px;
      padding: 10px 15px;
      cursor: pointer;
    }
    </style>