<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Digital Wallet Pass Designer</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <style>
            ::-webkit-scrollbar { display: none; }
            html {
                -ms-overflow-style: none;
                scrollbar-width: none;
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            }
            body {
                margin: 0;
                background: #ffffff;
                color: #1a1a1a;
                overflow-x: hidden;
            }

            .fixed-elements {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100;
            }

            .header {
                padding: 1.5rem;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }

            .logo {
                font-size: 1.5rem;
                font-weight: bold;
                color: #1a1a1a;
            }

            .cta-button {
                background: #1a1a1a;
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .cta-button:hover {
                background: #333;
                transform: translateY(-1px);
            }

            /* Stack layout */
            .cards-stack {
                position: relative;
                height: 400vh;
            }

            .card-container {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 340px;
                perspective: 2000px;
            }

            .card {
                position: absolute;
                width: 100%;
                opacity: 0;
                transform: translateY(40px) scale(0.8) rotateX(10deg);
                transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
                transform-origin: center bottom;
                filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            }

            .card.visible {
                opacity: 1;
                transform: translateY(0) scale(1) rotateX(0);
                z-index: 2;
                filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.15));
            }

            .card.stacked {
                opacity: 0.7;
                transform: translateY(-30px) scale(0.95) rotateX(5deg);
                z-index: 1;
            }

            /* Wallet pass styles */
            .wallet-pass {
                width: 340px;
                height: 200px;
                border-radius: 16px;
                padding: 24px;
                background: white;
                box-shadow: 
                    0 1px 3px rgba(0,0,0,0.12),
                    0 1px 2px rgba(0,0,0,0.24);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                box-sizing: border-box;
                position: relative;
                overflow: hidden;
                border: 1px solid rgba(0, 0, 0, 0.1);
            }

            .pass-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: #1a1a1a;
                margin-bottom: 1rem;
                letter-spacing: -0.02em;
            }

            .pass-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            .pass-logo {
                width: 48px;
                height: 48px;
                background: #f5f5f5;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .pass-type {
                font-size: 0.875rem;
                color: #666;
                font-weight: 500;
            }

            .pass-details {
                margin-top: 1rem;
            }

            .pass-number {
                font-size: 1.25rem;
                font-weight: 600;
                letter-spacing: 0.5px;
                color: #1a1a1a;
                margin-bottom: 0.25rem;
            }

            .pass-status {
                font-size: 0.875rem;
                color: #666;
            }

            .pass-footer {
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
                padding-top: 1rem;
                margin-top: 1rem;
            }

            .pass-validity {
                font-size: 0.875rem;
                color: #666;
            }

            .pass-barcode {
                width: 48px;
                height: 48px;
                background: #f5f5f5;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Decorative elements */
            .card-accent {
                position: absolute;
                top: 0;
                right: 0;
                width: 120px;
                height: 120px;
                border-radius: 60px;
                opacity: 0.1;
            }

            .membership-accent { background: linear-gradient(135deg, #4f46e5, #818cf8); }
            .event-accent { background: linear-gradient(135deg, #dc2626, #fb923c); }
            .loyalty-accent { background: linear-gradient(135deg, #059669, #2dd4bf); }
            .boarding-accent { background: linear-gradient(135deg, #7c3aed, #c084fc); }

            .scroll-hint {
                position: fixed;
                bottom: 2rem;
                left: 50%;
                transform: translateX(-50%);
                font-size: 0.875rem;
                color: #666;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
                opacity: 0.7;
            }

            .scroll-icon {
                font-size: 1.5rem;
                animation: bounce 2s infinite;
                color: #1a1a1a;
            }

            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
                40% { transform: translateY(-10px); }
                60% { transform: translateY(-5px); }
            }
        </style>
    </head>
    <body>
        <div class="fixed-elements">
            <header class="header">
                <div class="logo">Let's Pass-It</div>
                <a href="#" class="cta-button">Start Designing</a>
            </header>
        </div>

        <div class="cards-stack">
            <div class="card-container">
                <!-- Membership Pass -->
                <div class="card">
                    <div class="wallet-pass">
                        <div class="card-accent membership-accent"></div>
                        <div class="pass-title">Membership Pass</div>
                        <div class="pass-header">
                            <div class="pass-logo">
                                <i class="fas fa-crown" style="color: #4f46e5;"></i>
                            </div>
                            <span class="pass-type">Sunburn Event</span>
                        </div>
                        <div class="pass-details">
                            <div class="pass-number">GOLD-2024</div>
                            <div class="pass-status">Premium Member</div>
                        </div>
                        <div class="pass-footer">
                            <div class="pass-validity">Valid thru 12/24</div>
                            <div class="pass-barcode">
                                <i class="fas fa-qrcode" style="color: #666;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Pass -->
                <div class="card">
                    <div class="wallet-pass">
                        <div class="card-accent event-accent"></div>
                        <div class="pass-title">Event Pass</div>
                        <div class="pass-header">
                            <div class="pass-logo">
                                <i class="fas fa-ticket-alt" style="color: #dc2626;"></i>
                            </div>
                            <span class="pass-type">VIP ACCESS</span>
                        </div>
                        <div class="pass-details">
                            <div class="pass-number">Tech Conference 2024</div>
                            <div class="pass-status">Main Hall Access</div>
                        </div>
                        <div class="pass-footer">
                            <div class="pass-validity">Seat A-123</div>
                            <div class="pass-barcode">
                                <i class="fas fa-qrcode" style="color: #666;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loyalty Card -->
                <div class="card">
                    <div class="wallet-pass">
                        <div class="card-accent loyalty-accent"></div>
                        <div class="pass-title">Loyalty Card</div>
                        <div class="pass-header">
                            <div class="pass-logo">
                                <i class="fas fa-star" style="color: #059669;"></i>
                            </div>
                            <span class="pass-type">Silver Status</span>
                        </div>
                        <div class="pass-details">
                            <div class="pass-number">2,450 Points</div>
                            <div class="pass-status">Next Tier: 550 points away</div>
                        </div>
                        <div class="pass-footer">
                            <div class="pass-validity">Member since 2023</div>
                            <div class="pass-barcode">
                                <i class="fas fa-qrcode" style="color: #666;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boarding Pass -->
                <div class="card">
                    <div class="wallet-pass">
                        <div class="card-accent boarding-accent"></div>
                        <div class="pass-title">Boarding Pass</div>
                        <div class="pass-header">
                            <div class="pass-logo">
                                <i class="fas fa-plane" style="color: #7c3aed;"></i>
                            </div>
                            <span class="pass-type">FLIGHT AB123</span>
                        </div>
                        <div class="pass-details">
                            <div class="pass-number">Gate B12 • Seat 14A</div>
                            <div class="pass-status">Priority Boarding</div>
                        </div>
                        <div class="pass-footer">
                            <div class="pass-validity">SFO → NYC</div>
                            <div class="pass-barcode">
                                <i class="fas fa-qrcode" style="color: #666;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-hint">
            <i class="fas fa-mouse scroll-icon"></i>
            Scroll to explore passes
        </div>

        <script>
            const cards = document.querySelectorAll('.card');
            const cardCount = cards.length;
            const scrollHeight = document.querySelector('.cards-stack').offsetHeight;
            const windowHeight = window.innerHeight;
            let lastScrollTop = 0;
            
            function updateCards() {
                const scrollTop = window.pageYOffset;
                const scrollPercent = scrollTop / (scrollHeight - windowHeight);
                const currentIndex = Math.min(Math.floor(scrollPercent * cardCount), cardCount - 1);
                const scrollDirection = scrollTop > lastScrollTop ? 'down' : 'up';
                
                cards.forEach((card, index) => {
                    card.classList.remove('visible', 'stacked');
                    
                    if (index === currentIndex) {
                        card.classList.add('visible');
                    } else if (index < currentIndex) {
                        card.classList.add('stacked');
                    }
                });
                
                lastScrollTop = scrollTop;
            }

            // Initialize first card
            cards[0].classList.add('visible');

            // Update on scroll
            window.addEventListener('scroll', () => {
                requestAnimationFrame(updateCards);
            });

            // Handle touch events for mobile
            let touchStartY = 0;
            
            window.addEventListener('touchstart', (e) => {
                touchStartY = e.touches[0].clientY;
            });

            window.addEventListener('touchmove', (e) => {
                const touchY = e.touches[0].clientY;
                const diff = touchStartY - touchY;
                
                window.scrollBy(0, diff);
                touchStartY = touchY;
            });
        </script>
    </body>
</html>