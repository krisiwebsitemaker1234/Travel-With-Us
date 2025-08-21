<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universal AI Assistant</title>
    <script src="https://kit.fontawesome.com/dfba5e2447.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            color: #e2e8f0;
            overflow: hidden;
        }
        
        .background-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            background-image: radial-gradient(circle at 25% 25%, #00d4ff 0%, transparent 50%),
                              radial-gradient(circle at 75% 75%, #7c3aed 0%, transparent 50%);
            pointer-events: none;
        }
        
        .container {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            background: rgba(15, 15, 35, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            background: linear-gradient(135deg, #00d4ff, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .api-config-section {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .provider-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 10px 15px;
            color: #e2e8f0;
            font-size: 0.9rem;
            min-width: 120px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .provider-select:focus {
            outline: none;
            border-color: #00d4ff;
            box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.1);
        }
        
        .provider-select option {
            background: #1a1a2e;
            color: #e2e8f0;
        }
        
        .api-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 10px 15px;
            color: #e2e8f0;
            font-size: 0.9rem;
            width: 280px;
            transition: all 0.3s ease;
        }
        
        .api-input:focus {
            outline: none;
            border-color: #00d4ff;
            box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.1);
        }
        
        .api-input::placeholder {
            color: rgba(226, 232, 240, 0.5);
        }
        
        .save-key-btn {
            background: linear-gradient(135deg, #00d4ff, #0ea5e9);
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        
        .save-key-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(0, 212, 255, 0.3);
        }
        
        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            transition: all 0.3s ease;
        }
        
        .status-indicator.connected {
            background: #22c55e;
        }
        
        .provider-info {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 0.8rem;
            color: rgba(226, 232, 240, 0.7);
            max-width: 200px;
        }
        
        .main-content {
            flex: 1;
            display: flex;
            overflow: hidden;
        }
        
        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.02);
            margin: 20px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            overflow: hidden;
        }
        
        .chat-messages {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .chat-messages::-webkit-scrollbar {
            width: 6px;
        }
        
        .chat-messages::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .chat-messages::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }
        
        .message {
            display: flex;
            gap: 15px;
            max-width: 85%;
            animation: slideUp 0.3s ease;
        }
        
        .message.user {
            align-self: flex-end;
            flex-direction: row-reverse;
        }
        
        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        
        .bot-avatar {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
        }
        
        .user-avatar {
            background: linear-gradient(135deg, #00d4ff, #0ea5e9);
        }
        
        .message-content {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 18px;
            padding: 16px 20px;
            line-height: 1.6;
            backdrop-filter: blur(10px);
        }
        
        .message.user .message-content {
            background: linear-gradient(135deg, #00d4ff, #0ea5e9);
            color: white;
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .chat-input-area {
            padding: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .input-container {
            display: flex;
            gap: 15px;
            align-items: flex-end;
        }
        
        .message-input {
            flex: 1;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 15px 20px;
            color: #e2e8f0;
            font-size: 1rem;
            resize: none;
            min-height: 50px;
            max-height: 150px;
            transition: all 0.3s ease;
        }
        
        .message-input:focus {
            outline: none;
            border-color: #00d4ff;
            box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.1);
        }
        
        .message-input::placeholder {
            color: rgba(226, 232, 240, 0.5);
        }
        
        .send-btn {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            border: none;
            border-radius: 16px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .send-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
        }
        
        .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }
        
        .typing-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(226, 232, 240, 0.7);
            font-style: italic;
        }
        
        .typing-dots {
            display: flex;
            gap: 4px;
        }
        
        .typing-dot {
            width: 8px;
            height: 8px;
            background: rgba(124, 58, 237, 0.6);
            border-radius: 50%;
            animation: typingBounce 1.4s infinite ease-in-out;
        }
        
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }
        
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 12px;
            padding: 15px;
            color: #fca5a5;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .welcome-message {
            text-align: center;
            color: rgba(226, 232, 240, 0.7);
            margin: 50px 0;
        }
        
        .welcome-message h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #00d4ff, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .providers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .provider-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            text-align: center;
        }
        
        .provider-card h3 {
            color: #00d4ff;
            margin-bottom: 8px;
        }
        
        .provider-card .status {
            font-size: 0.8rem;
            color: rgba(226, 232, 240, 0.6);
        }
        
        .provider-card .free {
            color: #22c55e;
        }
        
        .provider-card .paid {
            color: #f59e0b;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes typingBounce {
            0%, 60%, 100% {
                transform: translateY(0);
            }
            30% {
                transform: translateY(-10px);
            }
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                padding: 15px 20px;
            }
            
            .api-config-section {
                width: 100%;
                justify-content: center;
                flex-direction: column;
            }
            
            .api-input {
                width: 100%;
                max-width: 300px;
            }
            
            .main-content {
                flex-direction: column;
            }
            
            .chat-container {
                margin: 10px;
            }
            
            .chat-messages {
                padding: 20px;
            }
            
            .chat-input-area {
                padding: 20px;
            }
            
            .providers-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="background-pattern"></div>
    
    <div class="container">
        <header class="header">
            <h1>
                <i class="fas fa-brain"></i>
                Universal AI Assistant
            </h1>
            <div class="api-config-section">
                <select id="providerSelect" class="provider-select">
                    <option value="groq">Groq (Free)</option>
                    <option value="openai">OpenAI</option>
                    <option value="anthropic">Anthropic Claude</option>
                    <option value="deepseek">DeepSeek</option>
                    <option value="cohere">Cohere</option>
                    <option value="mistral">Mistral AI</option>
                </select>
                <input 
                    type="password" 
                    id="apiKeyInput" 
                    class="api-input" 
                    placeholder="Enter your API key..."
                >
                <button id="saveKeyBtn" class="save-key-btn">
                    <i class="fas fa-key"></i> Connect
                </button>
                <div id="statusIndicator" class="status-indicator"></div>
                <div id="providerInfo" class="provider-info">
                    Select a provider to get started
                </div>
            </div>
        </header>
        
        <div class="main-content">
            <div class="chat-container">
                <div class="chat-messages" id="chatMessages">
                    <div class="welcome-message">
                        <h2>Universal AI Assistant</h2>
                        <p>Choose your preferred AI provider and start chatting!</p>
                        
                        <div class="providers-grid">
                            <div class="provider-card">
                                <h3>🚀 Groq</h3>
                                <div class="status free">Free • Fast</div>
                                <p>console.groq.com</p>
                            </div>
                            <div class="provider-card">
                                <h3>🧠 OpenAI</h3>
                                <div class="status paid">Paid • GPT-4</div>
                                <p>platform.openai.com</p>
                            </div>
                            <div class="provider-card">
                                <h3>🤖 Anthropic</h3>
                                <div class="status paid">Paid • Claude</div>
                                <p>console.anthropic.com</p>
                            </div>
                            <div class="provider-card">
                                <h3>🔍 DeepSeek</h3>
                                <div class="status paid">Paid • R1</div>
                                <p>platform.deepseek.com</p>
                            </div>
                            <div class="provider-card">
                                <h3>💬 Cohere</h3>
                                <div class="status free">Free Tier</div>
                                <p>dashboard.cohere.ai</p>
                            </div>
                            <div class="provider-card">
                                <h3>🎯 Mistral</h3>
                                <div class="status paid">Paid • Fast</div>
                                <p>console.mistral.ai</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="chat-input-area">
                    <div class="input-container">
                        <textarea 
                            id="messageInput" 
                            class="message-input" 
                            placeholder="Select a provider first..." 
                            rows="1"
                            disabled
                        ></textarea>
                        <button id="sendBtn" class="send-btn" disabled>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        class UniversalAIChatbot {
            constructor() {
                this.apiKey = '';
                this.currentProvider = 'groq';
                this.isConnected = false;
                this.conversationHistory = [];
                
                // Provider configurations
                this.providers = {
                    groq: {
                        name: 'Groq',
                        endpoint: 'https://api.groq.com/openai/v1/chat/completions',
                        model: 'llama-3.1-8b-instant',
                        info: 'Fast inference • Free tier • console.groq.com',
                        free: true,
                        maxTokens: 1000
                    },
                    openai: {
                        name: 'OpenAI',
                        endpoint: 'https://api.openai.com/v1/chat/completions',
                        model: 'gpt-4o-mini',
                        info: 'GPT-4 • Paid service • platform.openai.com',
                        free: false,
                        maxTokens: 1000
                    },
                    anthropic: {
                        name: 'Claude',
                        endpoint: 'https://api.anthropic.com/v1/messages',
                        model: 'claude-3-haiku-20240307',
                        info: 'Claude 3 • Paid service • console.anthropic.com',
                        free: false,
                        maxTokens: 1000,
                        special: 'anthropic' // Different API format
                    },
                    deepseek: {
                        name: 'DeepSeek',
                        endpoint: 'https://api.deepseek.com/v1/chat/completions',
                        model: 'deepseek-chat',
                        info: 'R1 reasoning • Paid service • platform.deepseek.com',
                        free: false,
                        maxTokens: 2000
                    },
                    cohere: {
                        name: 'Cohere',
                        endpoint: 'https://api.cohere.ai/v1/chat',
                        model: 'command-light',
                        info: 'Command models • Free tier • dashboard.cohere.ai',
                        free: true,
                        maxTokens: 1000,
                        special: 'cohere' // Different API format
                    },
                    mistral: {
                        name: 'Mistral',
                        endpoint: 'https://api.mistral.ai/v1/chat/completions',
                        model: 'mistral-tiny',
                        info: 'Fast models • Paid service • console.mistral.ai',
                        free: false,
                        maxTokens: 1000
                    }
                };
                
                this.initializeElements();
                this.bindEvents();
                this.updateProviderInfo();
                this.loadSavedConfig();
            }
            
            initializeElements() {
                this.providerSelect = document.getElementById('providerSelect');
                this.apiKeyInput = document.getElementById('apiKeyInput');
                this.saveKeyBtn = document.getElementById('saveKeyBtn');
                this.statusIndicator = document.getElementById('statusIndicator');
                this.providerInfo = document.getElementById('providerInfo');
                this.chatMessages = document.getElementById('chatMessages');
                this.messageInput = document.getElementById('messageInput');
                this.sendBtn = document.getElementById('sendBtn');
            }
            
            bindEvents() {
                this.providerSelect.addEventListener('change', () => {
                    this.currentProvider = this.providerSelect.value;
                    this.updateProviderInfo();
                    this.setConnectionStatus(false);
                    this.conversationHistory = [];
                });
                
                this.saveKeyBtn.addEventListener('click', () => this.saveApiKey());
                this.apiKeyInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') this.saveApiKey();
                });
                
                this.sendBtn.addEventListener('click', () => this.sendMessage());
                this.messageInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        this.sendMessage();
                    }
                });
                
                this.messageInput.addEventListener('input', () => {
                    this.autoResizeTextarea();
                });
            }
            
            updateProviderInfo() {
                const provider = this.providers[this.currentProvider];
                this.providerInfo.textContent = provider.info;
                this.apiKeyInput.placeholder = `Enter your ${provider.name} API key...`;
                
                // Update UI based on provider
                document.querySelector('.header h1').innerHTML = `
                    <i class="fas fa-brain"></i>
                    ${provider.name} Assistant
                `;
            }
            
            loadSavedConfig() {
                const savedProvider = sessionStorage.getItem('ai_provider');
                const savedKey = sessionStorage.getItem(`ai_key_${this.currentProvider}`);
                
                if (savedProvider && this.providers[savedProvider]) {
                    this.providerSelect.value = savedProvider;
                    this.currentProvider = savedProvider;
                    this.updateProviderInfo();
                }
                
                if (savedKey) {
                    this.apiKeyInput.value = savedKey;
                    this.saveApiKey();
                }
            }
            
            saveApiKey() {
                const key = this.apiKeyInput.value.trim();
                if (!key) {
                    this.showError('Please enter a valid API key');
                    return;
                }
                
                this.apiKey = key;
                sessionStorage.setItem('ai_provider', this.currentProvider);
                sessionStorage.setItem(`ai_key_${this.currentProvider}`, key);
                this.testConnection();
            }
            
            async testConnection() {
                try {
                    this.setConnectionStatus(false);
                    this.saveKeyBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Testing...';
                    
                    const provider = this.providers[this.currentProvider];
                    let response;
                    
                    // Different API formats for different providers
                    if (provider.special === 'anthropic') {
                        response = await this.callAnthropicAPI('Hello!');
                    } else if (provider.special === 'cohere') {
                        response = await this.callCohereAPI('Hello!');
                    } else {
                        // Standard OpenAI-compatible format
                        response = await fetch(provider.endpoint, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': `Bearer ${this.apiKey}`
                            },
                            body: JSON.stringify({
                                model: provider.model,
                                messages: [{ role: 'user', content: 'Hello!' }],
                                max_tokens: 10
                            })
                        });
                        
                        if (!response.ok) {
                            throw new Error(`API Error: ${response.status}`);
                        }
                    }
                    
                    this.setConnectionStatus(true);
                    this.clearWelcomeMessage();
                    this.addMessage(`Connected to ${provider.name}! How can I help you today?`, false);
                    
                } catch (error) {
                    this.setConnectionStatus(false);
                    this.showError(`Failed to connect to ${this.providers[this.currentProvider].name}. Please check your API key.`);
                    console.error('Connection test failed:', error);
                }
                
                this.saveKeyBtn.innerHTML = '<i class="fas fa-key"></i> Connect';
            }
            
            setConnectionStatus(connected) {
                this.isConnected = connected;
                this.statusIndicator.classList.toggle('connected', connected);
                this.messageInput.disabled = !connected;
                this.sendBtn.disabled = !connected;
                
                if (connected) {
                    this.messageInput.placeholder = 'Type your message here...';
                    this.messageInput.focus();
                } else {
                    this.messageInput.placeholder = 'Connect your API key first...';
                }
            }
            
            clearWelcomeMessage() {
                const welcomeMsg = this.chatMessages.querySelector('.welcome-message');
                if (welcomeMsg) {
                    welcomeMsg.remove();
                }
            }
            
            async sendMessage() {
                if (!this.isConnected) {
                    this.showError('Please connect your API key first');
                    return;
                }
                
                const message = this.messageInput.value.trim();
                if (!message) return;
                
                this.addMessage(message, true);
                this.messageInput.value = '';
                this.autoResizeTextarea();
                
                this.showTypingIndicator();
                
                try {
                    let response;
                    const provider = this.providers[this.currentProvider];
                    
                    if (provider.special === 'anthropic') {
                        response = await this.callAnthropicAPI(message);
                    } else if (provider.special === 'cohere') {
                        response = await this.callCohereAPI(message);
                    } else {
                        response = await this.callOpenAICompatibleAPI(message);
                    }
                    
                    this.removeTypingIndicator();
                    this.addMessage(response, false);
                } catch (error) {
                    this.removeTypingIndicator();
                    this.addMessage('Sorry, I encountered an error. Please try again.', false);
                    console.error('API call failed:', error);
                }
            }
            
            async callOpenAICompatibleAPI(userMessage) {
                this.conversationHistory.push({ role: 'user', content: userMessage });
                
                const provider = this.providers[this.currentProvider];
                const response = await fetch(provider.endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${this.apiKey}`
                    },
                    body: JSON.stringify({
                        model: provider.model,
                        messages: this.conversationHistory,
                        max_tokens: provider.maxTokens,
                        temperature: 0.7
                    })
                });
                
                if (!response.ok) {
                    throw new Error(`API Error: ${response.status}`);
                }
                
                const data = await response.json();
                const assistantMessage = data.choices[0].message.content;
                
                this.conversationHistory.push({ role: 'assistant', content: assistantMessage });
                return assistantMessage;
            }
            
            async callAnthropicAPI(userMessage) {
                // Anthropic uses a different format
                const response = await fetch(this.providers.anthropic.endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'x-api-key': this.apiKey,
                        'anthropic-version': '2023-06-01'
                    },
                    body: JSON.stringify({
                        model: this.providers.anthropic.model,
                        max_tokens: 1000,
                        messages: [{ role: 'user', content: userMessage }]
                    })
                });
                
                if (!response.ok) {
                    throw new Error(`API Error: ${response.status}`);
                }
                
                const data = await response.json();
                return data.content[0].text;
            }
            
            async callCohereAPI(userMessage) {
                // Cohere uses a different format
                const response = await fetch(this.providers.cohere.endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${this.apiKey}`
                    },
                    body: JSON.stringify({
                        model: this.providers.cohere.model,
                        message: userMessage,
                        max_tokens: 1000
                    })
                });
                
                if (!response.ok) {
                    throw new Error(`API Error: ${response.status}`);
                }
                
                const data = await response.json();
                return data.text;
            }
            
            addMessage(text, isUser) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
                
                const avatar = document.createElement('div');
                avatar.className = `message-avatar ${isUser ? 'user-avatar' : 'bot-avatar'}`;
                avatar.innerHTML = isUser ? '<i class="fas fa-user"></i>' : '<i class="fas fa-brain"></i>';
                
                const content = document.createElement('div');
                content.className = 'message-content';
                content.textContent = text;
                
                messageDiv.appendChild(avatar);
                messageDiv.appendChild(content);
                
                this.chatMessages.appendChild(messageDiv);
                this.chatMessages.scrollTop = this.chatMessages.scrollHeight;
            }
            
            showTypingIndicator() {
                const typingDiv = document.createElement('div');
                typingDiv.id = 'typingIndicator';
                typingDiv.className = 'message bot';
                
                const avatar = document.createElement('div');
                avatar.className = 'message-avatar bot-avatar';
                avatar.innerHTML = '<i class="fas fa-brain"></i>';
                
                const content = document.createElement('div');
                content.className = 'message-content';
                
                const indicator = document.createElement('div');
                indicator.className = 'typing-indicator';
                indicator.innerHTML = `
                    <span>${this.providers[this.currentProvider].name} is thinking</span>
                    <div class="typing-dots">
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                    </div>
                `;
                
                content.appendChild(indicator);
                typingDiv.appendChild(avatar);
                typingDiv.appendChild(content);
                
                this.chatMessages.appendChild(typingDiv);
                this.chatMessages.scrollTop = this.chatMessages.scrollHeight;
            }
            
            removeTypingIndicator() {
                const indicator = document.getElementById('typingIndicator');
                if (indicator) {
                    indicator.remove();
                }
            }
            
            showError(message) {
                const existingError = this.chatMessages.querySelector('.error-message');
                if (existingError) {
                    existingError.remove();
                }
                
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.innerHTML = `
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>${message}</span>
                `;
                
                this.chatMessages.appendChild(errorDiv);
                this.chatMessages.scrollTop = this.chatMessages.scrollHeight;
            }
            
            autoResizeTextarea() {
                this.messageInput.style.height = 'auto';
                this.messageInput.style.height = Math.min(this.messageInput.scrollHeight, 150) + 'px';
            }
        }
        
        // Initialize the chatbot when the page loads
        document.addEventListener('DOMContentLoaded', () => {
            new UniversalAIChatbot();
        });
    </script>
</body>
</html>