// Simple Dashboard Tutorial
window.dashboardTutorial = {
    steps: [
        {
            title: "Selamat Datang di Dashboard! 🎉",
            description: "Mari kita jelajahi fitur-fitur yang tersedia di dashboard Anda. Klik 'Lanjut' untuk memulai panduan.",
            element: null,
            position: "center"
        },
        {
            title: "Menu Beranda 🏠",
            description: "Ini adalah halaman Beranda, tempat Anda dapat melihat ringkasan aktivitas dan statistik akun Anda.",
            element: "dashboardNav",
            position: "right"
        },
        {
            title: "Menu Unggahan 📝",
            description: "Di sini Anda dapat melihat dan mengelola semua konten yang telah Anda unggah sebelumnya.",
            element: "postNav",
            position: "right"
        },
        {
            title: "Menu Redeem 🎁",
            description: "Gunakan points yang telah Anda kumpulkan untuk menukarkannya dengan hadiah menarik.",
            element: "redeemNav",
            position: "right"
        },
        {
            title: "Menu Akun 👤",
            description: "Kelola informasi profil dan pengaturan akun Anda di menu ini.",
            element: "accountNav",
            position: "right"
        },
        {
            title: "Logout 🔒",
            description: "Gunakan tombol ini untuk keluar dari akun Anda dengan aman.",
            element: "dashboardNavLogout",
            position: "top"
        }
    ],

    init: function() {
        console.log('🔄 Tutorial initialization started');
        
        // Cek apakah user sudah pernah melihat tutorial
        const hasSeenTutorial = localStorage.getItem('dashboardTutorialSeen');
        
        console.log('📊 Tutorial status:', { 
            hasSeenTutorial, 
            path: window.location.pathname,
            isDashboard: window.location.pathname.includes('dashboard')
        });
        
        if (!hasSeenTutorial) {
            console.log('🚀 Showing tutorial for first time user');
            // Tunggu sebentar agar semua element terload
            setTimeout(() => {
                this.showTutorial();
            }, 1500);
        } else {
            console.log('✅ User has already seen tutorial');
        }
    },

    showTutorial: function() {
        console.log('🎬 Starting tutorial show');
        
        const overlay = document.getElementById('dashboardTutorial');
        const bubble = document.getElementById('dashboardTutorialBubble');
        const title = document.getElementById('dashboardTutorialTitle');
        const description = document.getElementById('dashboardTutorialDescription');
        const skipBtn = document.getElementById('dashboardSkipTutorial');
        const nextBtn = document.getElementById('dashboardNextTutorial');
        const highlight = document.getElementById('dashboardTutorialHighlight');

        console.log('🔍 Tutorial elements:', { 
            overlay: !!overlay, 
            bubble: !!bubble, 
            title: !!title, 
            description: !!description,
            skipBtn: !!skipBtn,
            nextBtn: !!nextBtn,
            highlight: !!highlight
        });

        if (!overlay || !bubble) {
            console.error('❌ Required tutorial elements not found');
            return;
        }

        let currentStep = 0;

        const showStep = (stepIndex) => {
            console.log('📖 Showing step:', stepIndex);
            
            if (stepIndex >= this.steps.length) {
                console.log('🏁 Tutorial completed');
                this.hideTutorial();
                localStorage.setItem('dashboardTutorialSeen', 'true');
                return;
            }

            const step = this.steps[stepIndex];
            currentStep = stepIndex;

            // Update content
            if (title) title.textContent = step.title;
            if (description) description.textContent = step.description;

            // Reset bubble classes
            bubble.className = 'dashboard-tutorial-bubble';
            bubble.classList.add(step.position);

            // Handle element highlighting
            this.highlightElement(step.element, highlight);

            // Position bubble
            this.positionBubble(step, bubble);

            // Show everything
            overlay.classList.add('active');
            setTimeout(() => {
                bubble.classList.add('active');
            }, 100);
        };

        this.hideTutorial = function() {
            overlay.classList.remove('active');
            bubble.classList.remove('active');
            if (highlight) highlight.style.display = 'none';
            
            // Remove all highlights
            document.querySelectorAll('.dashboard-highlighted-element').forEach(el => {
                el.classList.remove('dashboard-highlighted-element');
            });
        };

        this.highlightElement = function(elementId, highlight) {
            // Remove previous highlights
            document.querySelectorAll('.dashboard-highlighted-element').forEach(el => {
                el.classList.remove('dashboard-highlighted-element');
            });

            if (!elementId) {
                if (highlight) highlight.style.display = 'none';
                return;
            }

            const element = document.getElementById(elementId);
            console.log('🎯 Highlighting element:', elementId, 'Found:', !!element);

            if (element) {
                element.classList.add('dashboard-highlighted-element');
                
                if (highlight) {
                    const rect = element.getBoundingClientRect();
                    highlight.style.width = `${rect.width + 20}px`;
                    highlight.style.height = `${rect.height + 20}px`;
                    highlight.style.top = `${rect.top - 10 + window.scrollY}px`;
                    highlight.style.left = `${rect.left - 10}px`;
                    highlight.style.display = 'block';
                }
            }
        };

        this.positionBubble = function(step, bubble) {
            if (!step.element) {
                // Center the bubble
                bubble.style.position = 'fixed';
                bubble.style.top = '50%';
                bubble.style.left = '50%';
                bubble.style.transform = 'translate(-50%, -50%)';
                return;
            }

            const element = document.getElementById(step.element);
            if (!element) return;

            const rect = element.getBoundingClientRect();
            const bubbleRect = bubble.getBoundingClientRect();

            switch (step.position) {
                case 'top':
                    bubble.style.top = `${rect.top - bubbleRect.height - 20 + window.scrollY}px`;
                    bubble.style.left = `${rect.left + rect.width / 2 - bubbleRect.width / 2}px`;
                    break;
                case 'bottom':
                    bubble.style.top = `${rect.bottom + 20 + window.scrollY}px`;
                    bubble.style.left = `${rect.left + rect.width / 2 - bubbleRect.width / 2}px`;
                    break;
                case 'left':
                    bubble.style.top = `${rect.top + rect.height / 2 - bubbleRect.height / 2 + window.scrollY}px`;
                    bubble.style.left = `${rect.left - bubbleRect.width - 20}px`;
                    break;
                case 'right':
                default:
                    bubble.style.top = `${rect.top + rect.height / 2 - bubbleRect.height / 2 + window.scrollY}px`;
                    bubble.style.left = `${rect.right + 20}px`;
                    break;
            }
            
            bubble.style.position = 'fixed';
            bubble.style.transform = 'none';
        };

        // Event listeners
        if (skipBtn) {
            skipBtn.onclick = () => {
                console.log('⏭️ Tutorial skipped');
                this.hideTutorial();
                localStorage.setItem('dashboardTutorialSeen', 'true');
            };
        }

        if (nextBtn) {
            nextBtn.onclick = () => {
                console.log('➡️ Next step clicked');
                bubble.classList.remove('active');
                setTimeout(() => {
                    showStep(currentStep + 1);
                }, 300);
            };
        }

        // Start the tutorial
        showStep(0);
    }
};

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    console.log('📄 DOM fully loaded');
    
    // Initialize tutorial
    if (window.dashboardTutorial) {
        console.log('🎯 Initializing dashboard tutorial');
        window.dashboardTutorial.init();
    } else {
        console.error('💥 Dashboard tutorial not found!');
    }
});

// Fallback initialization
window.addEventListener('load', function() {
    console.log('🖼️ Window fully loaded');
    if (window.dashboardTutorial && !localStorage.getItem('dashboardTutorialSeen')) {
        console.log('🔄 Fallback tutorial initialization');
        setTimeout(() => {
            window.dashboardTutorial.init();
        }, 2000);
    }
});