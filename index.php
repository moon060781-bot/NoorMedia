<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Noor Media Solution - Premier Event Photography & Videography Services. 30+ Years of Experience covering Weddings, Corporate Events, and more.">
    <title>Noor Media Solution | Event Photography & Videography</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <!-- Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            gold: '#C5A059',
                            dark: '#0f0f0f',
                            gray: '#1a1a1a'
                        }
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .hero-bg {
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-brand-dark text-white antialiased">

    <!-- NAVIGATION -->
    <nav class="fixed w-full z-50 bg-black/90 backdrop-blur-sm border-b border-gray-800" id="navbar">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="flex items-center gap-3">
                <img src="http://nm.noorgee.pk/asset/Nms-logo.png" alt="NMS Logo" class="h-12 md:h-14 object-contain">
                <div class="hidden md:block">
                    <h1 class="text-xl font-serif font-bold text-white tracking-wide">NOOR MEDIA</h1>
                    <p class="text-[10px] text-brand-gold tracking-[0.2em] uppercase">Solution</p>
                </div>
            </a>
            <div class="hidden md:flex items-center space-x-8 text-sm font-semibold tracking-wider">
                <a href="#home" class="hover:text-brand-gold transition">HOME</a>
                <a href="#about" class="hover:text-brand-gold transition">ABOUT</a>
                <a href="#services" class="hover:text-brand-gold transition">SERVICES</a>
                <a href="#portfolio" class="hover:text-brand-gold transition">PORTFOLIO</a>
                <a href="#team" class="hover:text-brand-gold transition">TEAM</a>
                <a href="#contact" class="px-5 py-2 bg-brand-gold text-black rounded-full hover:bg-white transition">BOOK NOW</a>
            </div>
            <button class="md:hidden text-2xl text-white" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-brand-gray border-t border-gray-700 text-center py-4">
            <a href="#home" class="block py-3 hover:text-brand-gold">Home</a>
            <a href="#services" class="block py-3 hover:text-brand-gold">Services</a>
            <a href="#contact" class="block py-3 text-brand-gold font-bold">Contact Us</a>
        </div>
    </nav>

    <!-- HERO -->
    <section id="home" class="hero-bg h-screen flex items-center justify-center text-center px-4">
        <div class="max-w-4xl">
            <p class="text-brand-gold font-bold tracking-[0.3em] mb-4 uppercase">Serving Since 1994</p>
            <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6">Capturing Moments <br> Creating Memories</h1>
            <p class="text-gray-300 text-lg mb-10">Professional Wedding Photography & Cinematic Videography.</p>
            <div class="flex gap-4 justify-center">
                <a href="#contact" class="px-8 py-4 bg-brand-gold text-black font-bold rounded hover:bg-white transition">Book Event</a>
                <a href="#portfolio" class="px-8 py-4 border border-white text-white font-bold rounded hover:bg-white hover:text-black transition">Gallery</a>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="py-20 bg-brand-dark">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-brand-gold uppercase tracking-widest text-sm font-bold mb-2">Our Expertise</h2>
            <h3 class="text-4xl font-serif font-bold mb-16">Services We Provide</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-brand-gray p-8 rounded-lg border border-gray-800 hover:border-brand-gold transition">
                    <i class="fas fa-rings text-4xl text-brand-gold mb-4"></i>
                    <h4 class="text-xl font-bold mb-2">Wedding Photography</h4>
                    <p class="text-gray-400">Full event coverage from Mehndi to Walima.</p>
                </div>
                <div class="bg-brand-gray p-8 rounded-lg border border-gray-800 hover:border-brand-gold transition">
                    <i class="fas fa-film text-4xl text-brand-gold mb-4"></i>
                    <h4 class="text-xl font-bold mb-2">Cinematic Video</h4>
                    <p class="text-gray-400">4K Highlights, Drone shots & Storytelling.</p>
                </div>
                <div class="bg-brand-gray p-8 rounded-lg border border-gray-800 hover:border-brand-gold transition">
                    <i class="fas fa-book-open text-4xl text-brand-gold mb-4"></i>
                    <h4 class="text-xl font-bold mb-2">Digital Albums</h4>
                    <p class="text-gray-400">Premium Dubai binding & Karizma prints.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PORTFOLIO -->
    <section id="portfolio" class="py-20 bg-black text-center">
        <h3 class="text-4xl font-serif font-bold mb-8">Our Recent Work</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 container mx-auto px-4">
            <div class="col-span-2 row-span-2 overflow-hidden rounded-lg">
                <img src="asset/Wedding-highlight.png" alt="Wedding Highlights" class="w-full h-full object-cover hover:scale-105 transition duration-500">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="asset/Bride-Portrait.png" alt="Bride Portrait" class="w-full h-64 object-cover hover:scale-105 transition duration-500">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="asset/Event-decore.png" alt="Event Decor" class="w-full h-64 object-cover hover:scale-105 transition duration-500">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="asset/Candid-Shot.png" alt="Candid Shot" class="w-full h-64 object-cover hover:scale-105 transition duration-500">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="asset/Corporae-Event.png" alt="Corporate Event" class="w-full h-64 object-cover hover:scale-105 transition duration-500">
            </div>
        </div>
    </section>

    <!-- TEAM SECTION -->
    <section id="team" class="py-20 bg-brand-gray">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-brand-gold uppercase tracking-widest text-sm font-bold mb-2">The Minds Behind NMS</h2>
            <h3 class="text-4xl font-serif font-bold mb-12">Meet Our Team</h3>
            
            <div class="flex flex-wrap justify-center gap-10">
                <!-- Rizwan Elahi -->
                <div class="bg-brand-dark p-6 rounded-lg w-full md:w-1/3 border border-gray-800">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gray-700 mb-4 flex items-center justify-center text-3xl">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-white">Rizwan Elahi</h4>
                    <p class="text-brand-gold uppercase text-sm tracking-wider mt-1">Operation Manager</p>
                </div>

                <!-- NoorGee -->
                <div class="bg-brand-dark p-6 rounded-lg w-full md:w-1/3 border border-gray-800">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gray-700 mb-4 flex items-center justify-center text-3xl">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-white">NoorGee</h4>
                    <p class="text-brand-gold uppercase text-sm tracking-wider mt-1">Marketing Director</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py-20 bg-brand-dark">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-4xl font-serif font-bold mb-6">Get In Touch</h3>
                <p class="text-gray-400 mb-8">Let's discuss how we can capture your memories.</p>
                <div class="space-y-4">
                    <p><i class="fas fa-phone-alt text-brand-gold mr-3"></i> +92 332-3320369</p>
                    <p><i class="fas fa-envelope text-brand-gold mr-3"></i> nmspvt121212@gmail.com</p>
                    <p>
                        <a href="https://www.facebook.com/noormediasolution" class="text-blue-500 mr-4"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="https://www.youtube.com/@noormediasolution/" class="text-red-500"><i class="fab fa-youtube"></i> YouTube</a>
                    </p>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="bg-brand-gray p-8 rounded-xl border border-gray-800">
                <form action="submit_message.php" method="POST">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Name</label>
                            <input type="text" name="name" required class="w-full bg-gray-800 border border-gray-700 rounded p-3 text-white focus:border-brand-gold outline-none">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Contact No</label>
                            <input type="tel" name="contact" required class="w-full bg-gray-800 border border-gray-700 rounded p-3 text-white focus:border-brand-gold outline-none">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs text-gray-500 mb-1">Email</label>
                        <input type="email" name="email" required class="w-full bg-gray-800 border border-gray-700 rounded p-3 text-white focus:border-brand-gold outline-none">
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs text-gray-500 mb-1">Subject</label>
                        <input type="text" name="subject" required class="w-full bg-gray-800 border border-gray-700 rounded p-3 text-white focus:border-brand-gold outline-none">
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs text-gray-500 mb-1">Message</label>
                        <textarea name="message" rows="4" required class="w-full bg-gray-800 border border-gray-700 rounded p-3 text-white focus:border-brand-gold outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-brand-gold text-black font-bold py-3 rounded hover:bg-white transition">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-black py-8 border-t border-gray-900 text-center relative">
        <div class="container mx-auto px-4">
            <img src="https://nm.noorgee.pk/asset/Nms-logo.png" alt="Logo" class="h-10 mx-auto mb-4 opacity-70">
            <p class="text-gray-500 text-sm">copyright © 2024 Noor Media Solution.</p>
            
            <!-- Admin Tiny Link -->
            <div class="mt-4 flex justify-center gap-4">
                <a href="admin.php" class="text-[10px] text-gray-800 hover:text-gray-600" target="_blank">
                    <i class="fas fa-lock"></i> Staff Login
                </a>
                <a href="deploy.php" class="text-[10px] text-gray-800 hover:text-gray-600" target="_blank">
                    <i class="fas fa-rocket"></i> Deploy
                </a>
            </div>
        </div>
    </footer>
    
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('status') === 'success') {
            alert("Message Sent! We will contact you shortly.");
        }
    </script>
</body>
</html>
