<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Digital Wallet Pass Designer</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <style>
            /* Same styles as before until header */
            ::-webkit-scrollbar { display: none; }
            html {
                -ms-overflow-style: none;
                scrollbar-width: none;
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            }
            body {
                margin: 0;
                background: #0f172a;
                color: #fff;
                overflow-x: hidden;
            }

            /* Fixed elements */
            .fixed-elements {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100;
                pointer-events: none; /* Allows scrolling through the fixed elements */
            }

            .header {
                padding: 1.5rem;
                background: rgba(15, 23, 42, 0.9);
                backdrop-filter: blur(10px);
                display: flex;
                justify-content: space-between;
                align-items: center;
                pointer-events: auto; /* Re-enable pointer events for header */
            }

            .logo {
                font-size: 1.5rem;
                font-weight: bold;
                background: linear-gradient(135deg, #60a5fa, #a855f7);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .cta-button {
                background: linear-gradient(135deg, #60a5fa, #a855f7);
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 50px;
                text-decoration: none;
                font-weight: 500;
            }

            .showcase-title {
                text-align: center;
                padding: 2rem 1rem;
                margin: 0;
                font-size: 2.5rem;
                background: linear-gradient(135deg, #60a5fa, #a855f7);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                pointer-events: auto; /* Re-enable pointer events for title */
            }

            /* Card container adjustments */
            .card-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                perspective: 1000px;
                padding-top: 3rem; /* Add some space below the title */
            }

            .card {
                position: absolute;
                opacity: 0;
                transform: translateY(100px) scale(0.8);
                transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                pointer-events: none;
            }

            .card.active {
                opacity: 1;
                transform: translateY(0) scale(1);
                pointer-events: auto;
            }

            .card.previous {
                opacity: 0;
                transform: translateY(-100px) scale(0.8);
            }

            /* Pass card styles */
            .wallet-pass {
                width: 300px;
                height: 180px;
                border-radius: 15px;
                padding: 20px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .pass-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            .pass-logo {
                width: 50px;
                height: 50px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 10px;
            }

            .pass-type {
                font-size: 0.875rem;
                opacity: 0.8;
            }

            .pass-details {
                margin-top: 1rem;
            }

            .pass-number {
                font-size: 1.25rem;
                font-weight: bold;
                letter-spacing: 2px;
            }

            .pass-footer {
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
            }

            .pass-barcode {
                width: 50px;
                height: 50px;
                background: rgba(255, 255, 255, 0.9);
                border-radius: 5px;
            }

            .spacer {
                height: 400vh;
            }

            .scroll-hint {
                position: fixed;
                bottom: 2rem;
                left: 50%;
                transform: translateX(-50%);
                font-size: 0.875rem;
                color: #94a3b8;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
                opacity: 0.7;
                pointer-events: none;
            }

            .scroll-icon {
                font-size: 1.5rem;
                animation: bounce 2s infinite;
            }

            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
                40% { transform: translateY(-10px); }
                60% { transform: translateY(-5px); }
            }
            .circle {
                width: 150px;  /* Set the size of the circle */
                height: 150px; /* Make it a perfect circle */
                border-radius: 50%; /* This makes it round */
                overflow: hidden; /* Ensures the image is clipped to fit the circle */
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f0f0f0; /* Optional background color */
            }

            .circle-image {
                width: 100%;
                height: 100%;
                object-fit: cover; /* Ensures the image covers the circle without distorting */
            }

        </style>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Fixed elements container -->
        <div class="fixed-elements">
            <header class="header">
                <div class="logo">PassDesigner</div>
                <a href="#" class="cta-button">Start Designing</a>
            </header>
            <h1 class="showcase-title">Discover Our Pass Designs</h1>
        </div>

        <!-- Cards container -->
        <div class="card-container">
            <!-- Membership Pass -->
            <div class="card">
                <div class="wallet-pass" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                    <div class="pass-header">
                        <div class="pass-logo"></div>
                        <span class="pass-type">Sunburn Event</span>
                    </div>
                    <div class="pass-details">
                        <div class="pass-number">GOLD-2024</div>
                        <div>Premium Member</div>
                    </div>
                    <div class="pass-footer">
                        <div>Valid thru 12/24</div>
                        <div class="pass-barcode"></div>
                    </div>
                </div>
            </div>

            <!-- Event Pass -->
            <div class="card">
                <div class="wallet-pass" style="background: linear-gradient(135deg, #ef4444, #f97316);">
                    <div class="pass-header">
                        <div class="pass-logo"></div>
                        <span class="pass-type">EVENT</span>
                    </div>
                    <div class="pass-details">
                        <div class="pass-number">VIP ACCESS</div>
                        <div>Tech Conference 2024</div>
                    </div>
                    <div class="pass-footer">
                        <div>Seat A-123</div>
                        <div class="pass-barcode"></div>
                    </div>
                </div>
            </div>

            <!-- Loyalty Card -->
            <div class="card">
                <div class="wallet-pass" style="background: linear-gradient(135deg, #10b981, #14b8a6);">
                    <div class="pass-header">
                        <div class="pass-logo"></div>
                        <span class="pass-type">LOYALTY</span>
                    </div>
                    <div class="pass-details">
                        <div class="pass-number">POINTS: 2,450</div>
                        <div>Silver Status</div>
                    </div>
                    <div class="pass-footer">
                        <div>Member since 2023</div>
                        <div class="pass-barcode"></div>
                    </div>
                </div>
            </div>

            <!-- Boarding Pass -->
            <div class="card">
                <div class="wallet-pass" style="background: linear-gradient(135deg, #6366f1, #a855f7);">
                    <div class="pass-header">
                        <div class="pass-logo"></div>
                        <span class="pass-type">BOARDING</span>
                    </div>
                    <div class="pass-details">
                        <div class="pass-number">FLIGHT AB123</div>
                        <div>Gate B12 • Seat 14A</div>
                    </div>
                    <div class="pass-footer">
                        <div>SFO → NYC</div>
                        <div class="pass-barcode"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-hint">
            <i class="fas fa-mouse scroll-icon"></i>
            Scroll to explore passes
        </div>

        <div class="spacer"></div>

        <script>
            // Same JavaScript as before
            const cards = document.querySelectorAll(".card");
            const cardCount = cards.length;
            let isScrolling = false;
            let currentCardIndex = 0;

            window.addEventListener('wheel', (e) => {
                if (isScrolling) return;
                
                const direction = e.deltaY > 0 ? 1 : -1;
                const newIndex = Math.max(0, Math.min(currentCardIndex + direction, cardCount - 1));
                
                if (newIndex !== currentCardIndex) {
                    isScrolling = true;
                    currentCardIndex = newIndex;
                    
                    window.scrollTo({
                        top: currentCardIndex * window.innerHeight,
                        behavior: 'smooth'
                    });

                    updateCards(currentCardIndex);
                    
                    setTimeout(() => {
                        isScrolling = false;
                    }, 700);
                }
            });

            let touchStartY = 0;
            let touchEndY = 0;

            window.addEventListener('touchstart', (e) => {
                touchStartY = e.touches[0].clientY;
            });

            window.addEventListener('touchmove', (e) => {
                if (isScrolling) {
                    e.preventDefault();
                }
            }, { passive: false });

            window.addEventListener('touchend', (e) => {
                if (isScrolling) return;

                touchEndY = e.changedTouches[0].clientY;
                const direction = touchStartY > touchEndY ? 1 : -1;
                const newIndex = Math.max(0, Math.min(currentCardIndex + direction, cardCount - 1));

                if (Math.abs(touchStartY - touchEndY) > 50 && newIndex !== currentCardIndex) {
                    isScrolling = true;
                    currentCardIndex = newIndex;

                    window.scrollTo({
                        top: currentCardIndex * window.innerHeight,
                        behavior: 'smooth'
                    });

                    updateCards(currentCardIndex);

                    setTimeout(() => {
                        isScrolling = false;
                    }, 700);
                }
            });

            function updateCards(activeIndex) {
                cards.forEach((card, index) => {
                    if (index === activeIndex) {
                        card.classList.remove('previous');
                        card.classList.add('active');
                    } else if (index < activeIndex) {
                        card.classList.add('previous');
                        card.classList.remove('active');
                    } else {
                        card.classList.remove('previous', 'active');
                    }
                });
            }

            cards[0].classList.add('active');
        </script>
    </body>
</html>