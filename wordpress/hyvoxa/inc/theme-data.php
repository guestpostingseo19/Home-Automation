<?php
/**
 * Theme data: services, blog posts, legal documents, site settings.
 *
 * This file provides structured data used during theme activation
 * to auto-create all CPT entries, blog posts, and pages.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Return the Hyvoxa site settings array.
 */
function hyvoxa_site_settings() {
    return array(
        'name'        => 'Hyvoxa',
        'email'       => 'hyvoxa@gmail.com',
        'tagline'     => 'Intelligent homes, effortlessly lived in',
        'description' => 'Hyvoxa designs, installs and maintains premium smart home automation systems, intelligent lighting, climate, security, entertainment and voice control tailored to your home.',
        'phone'       => '+1 (555) 048-2910',
        'address'     => '218 Maple Court, Suite 4, Portland, OR 97204',
        'hours'       => 'Mon-Fri 8am-6pm, Sat 9am-2pm',
        'stats' => array(
            array( 'value' => '850+', 'label' => 'Homes Automated' ),
            array( 'value' => '12',   'label' => 'Years of Expertise' ),
            array( 'value' => '40%',  'label' => 'Average Energy Saved' ),
            array( 'value' => '4.9',  'label' => 'Client Satisfaction' ),
        ),
        'process' => array(
            array( 'step' => '01', 'title' => 'Consultation',           'desc' => 'We visit your home, listen to how you live and map the opportunities for automation across every space.' ),
            array( 'step' => '02', 'title' => 'Custom Design',          'desc' => 'A tailored system design with equipment, scenes and control strategy, refined until it fits your life perfectly.' ),
            array( 'step' => '03', 'title' => 'Professional Install',   'desc' => 'Our certified technicians install every component with concealed wiring and meticulous attention to detail.' ),
            array( 'step' => '04', 'title' => 'Programming & Handover', 'desc' => 'We program your routines, calibrate every system and train you thoroughly so the home feels effortless from day one.' ),
        ),
    );
}

/**
 * Return all services data.
 */
function hyvoxa_services_data() {
    return array(
        array(
            'slug'      => 'smart-lighting',
            'title'     => 'Intelligent Lighting',
            'menu_icon' => 'dashicons-lightbulb',
            'icon'      => 'lightbulb',
            'short'     => 'Adaptive lighting that follows your day.',
            'tagline'   => 'Light that thinks with you',
            'image'     => 'https://images.pexels.com/photos/34989208/pexels-photo-34989208.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Hyvoxa transforms ordinary lighting into a living, responsive system that adapts to your routines, moods and natural daylight. From warm morning wake-ups to cinematic evening scenes, every fixture is orchestrated through a single, elegant interface you control by touch, app or voice.',
            'intro'     => 'Hyvoxa transforms ordinary lighting into a living, responsive system that adapts to your routines, moods and natural daylight. From warm morning wake-ups to cinematic evening scenes, every fixture is orchestrated through a single, elegant interface you control by touch, app or voice.',
            'benefits' => array(
                array( 'title' => 'Circadian Rhythm Sync',   'desc' => 'Color temperature shifts throughout the day to match natural sunlight, supporting better sleep and energy.' ),
                array( 'title' => 'Scene Automation',        'desc' => 'One tap sets dozens of fixtures to the perfect brightness and tone for cooking, working, movie night or entertaining.' ),
                array( 'title' => 'Energy Savings',          'desc' => 'Occupancy and daylight sensors cut wasted electricity by up to 40% without you ever touching a switch.' ),
                array( 'title' => 'Architectural Beauty',    'desc' => 'Recessed, cove and accent lighting are integrated invisibly into your architecture for a clean, premium finish.' ),
            ),
            'features' => array(
                'Whole-home tunable-white and full-color LED integration',
                'Motorized shading and blackout coordination',
                'Voice control with Alexa, Google and HomeKit',
                'Custom-designed keypads and touch panels',
                'Sunrise and sunset astronomical scheduling',
                'Occupancy and daylight harvesting sensors',
            ),
            'process' => array(
                array( 'step' => '01', 'title' => 'Lighting Design',   'desc' => 'Our designers map every space for fixture placement, beam angles and color temperature to achieve your desired ambiance.' ),
                array( 'step' => '02', 'title' => 'Infrastructure',    'desc' => 'We run low-voltage wiring and install dimming panels before finishes, ensuring a completely invisible control backbone.' ),
                array( 'step' => '03', 'title' => 'Programming',       'desc' => 'Scenes, schedules and sensor logic are programmed around your daily routines and refined over a calibration week.' ),
                array( 'step' => '04', 'title' => 'Handover',          'desc' => 'You receive a guided walkthrough, personalized app dashboard and one year of complimentary scene adjustments.' ),
            ),
            'faqs' => array(
                array( 'q' => 'Can Hyvoxa integrate lighting into my existing home?', 'a' => 'Yes. We work with both new builds and retrofit projects. For existing homes we use wireless dimming modules that install behind your current switches, requiring no new wiring in most rooms.' ),
                array( 'q' => 'Do I need special bulbs for the whole system?', 'a' => 'Not necessarily. We support both low-voltage fixture-level dimming and smart bulbs. During the design phase we recommend the best approach for each space based on your fixtures and budget.' ),
                array( 'q' => 'Will the lights still work if my internet goes down?', 'a' => 'Absolutely. All control processing happens on a local hub within your home. Internet is only needed for remote access and voice assistants; physical keypads and sensors always function independently.' ),
            ),
            'meta_description' => 'Hyvoxa intelligent lighting systems adapt to your routines with circadian scenes, voice control and energy-saving sensors. Premium design and installation.',
        ),
        array(
            'slug'      => 'climate-control',
            'title'     => 'Climate Automation',
            'menu_icon' => 'dashicons-thermostat',
            'icon'      => 'thermometer',
            'short'     => 'Perfect temperature in every room, automatically.',
            'tagline'   => 'Comfort on autopilot',
            'image'     => 'https://images.pexels.com/photos/36077581/pexels-photo-36077581.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Hyvoxa climate automation keeps every room at the ideal temperature without you lifting a finger. Smart thermostats, zoning and humidity sensors learn your patterns and adjust proactively, so the house is comfortable the moment you walk in and efficient the moment you leave.',
            'intro'     => 'Hyvoxa climate automation keeps every room at the ideal temperature without you lifting a finger. Smart thermostats, zoning and humidity sensors learn your patterns and adjust proactively, so the house is comfortable the moment you walk in and efficient the moment you leave.',
            'benefits' => array(
                array( 'title' => 'Room-by-Room Zoning',  'desc' => 'Independent temperature control for each space means no more fighting over the thermostat and no wasted energy in empty rooms.' ),
                array( 'title' => 'Geofence Activation',  'desc' => 'Your home detects when you are heading back and pre-conditions the space, so comfort is waiting when you arrive.' ),
                array( 'title' => 'Lower Energy Bills',   'desc' => 'Predictive scheduling and occupancy detection reduce heating and cooling costs by an average of 23%.' ),
                array( 'title' => 'Air Quality Monitoring','desc' => 'Integrated humidity, CO2 and VOC sensors trigger ventilation automatically, keeping indoor air healthy year-round.' ),
            ),
            'features' => array(
                'Multi-zone smart thermostat integration',
                'Underfloor heating coordination',
                'Humidity and air quality sensing',
                'Geofence and schedule-based automation',
                'Energy usage reporting and insights',
                'Remote climate control from anywhere',
            ),
            'process' => array(
                array( 'step' => '01', 'title' => 'Home Assessment',   'desc' => 'We evaluate your HVAC system, insulation and room usage to design the optimal zoning strategy.' ),
                array( 'step' => '02', 'title' => 'Sensor Placement',  'desc' => 'Thermostats and air-quality sensors are placed for accurate readings and unobtrusive aesthetics.' ),
                array( 'step' => '03', 'title' => 'Automation Logic',  'desc' => 'Schedules, geofences and occupancy rules are programmed to your lifestyle and refined over the first month.' ),
                array( 'step' => '04', 'title' => 'Ongoing Tuning',    'desc' => 'Seasonal adjustments keep efficiency high as weather and routines change throughout the year.' ),
            ),
            'faqs' => array(
                array( 'q' => 'Is climate automation compatible with my existing HVAC?', 'a' => 'In most cases yes. We work with all major HVAC brands and can add zoning controllers to existing ducted systems. For homes with radiant or underfloor heating we integrate dedicated controllers.' ),
                array( 'q' => 'How much can I really save on energy bills?', 'a' => 'Clients typically see a 15-30% reduction in heating and cooling costs. The exact figure depends on your home size, climate and how aggressively you adopt automation schedules.' ),
                array( 'q' => 'Can I control the climate when I am away from home?', 'a' => 'Yes. The Hyvoxa app gives you full remote control of every zone, plus alerts if temperature or humidity moves outside your preferred range.' ),
            ),
            'meta_description' => 'Hyvoxa climate automation delivers room-by-room zoning, geofence activation and air-quality monitoring that lowers energy bills while keeping every space comfortable.',
        ),
        array(
            'slug'      => 'security-surveillance',
            'title'     => 'Security & Surveillance',
            'menu_icon' => 'dashicons-shield',
            'icon'      => 'shield',
            'short'     => 'Always-on protection with intelligent awareness.',
            'tagline'   => 'Aware of everything, worried about nothing',
            'image'     => 'https://images.pexels.com/photos/27505236/pexels-photo-27505236.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Hyvoxa security systems combine high-definition surveillance, smart access control and AI-driven alerts into a single protective layer around your home. You see everything that matters in real time, and nothing that does not, because the system learns the difference between a delivery driver and an intruder.',
            'intro'     => 'Hyvoxa security systems combine high-definition surveillance, smart access control and AI-driven alerts into a single protective layer around your home. You see everything that matters in real time, and nothing that does not, because the system learns the difference between a delivery driver and an intruder.',
            'benefits' => array(
                array( 'title' => 'AI Threat Detection',        'desc' => 'Object recognition filters people, vehicles and animals so you only receive alerts when something genuinely matters.' ),
                array( 'title' => '24/7 Remote Monitoring',     'desc' => 'View live feeds, recorded events and doorbell cameras from anywhere with bank-grade encrypted streaming.' ),
                array( 'title' => 'Smart Access Control',       'desc' => 'Keyless entry, temporary guest codes and automated lock schedules mean you never wonder if you locked the door.' ),
                array( 'title' => 'Integrated Deterrence',      'desc' => 'Lights, sirens and gates activate automatically on verified threats, often resolving incidents before they escalate.' ),
            ),
            'features' => array(
                '4K PoE camera systems with night vision',
                'AI-powered person and vehicle detection',
                'Video doorbell and two-way audio',
                'Smart locks with temporary access codes',
                'Glass-break and motion sensors',
                'Professional monitoring integration available',
            ),
            'process' => array(
                array( 'step' => '01', 'title' => 'Security Survey',  'desc' => 'We assess entry points, sightlines and vulnerability zones to design comprehensive camera and sensor coverage.' ),
                array( 'step' => '02', 'title' => 'Hardware Install', 'desc' => 'Cameras, sensors and access control are installed with concealed cabling and vandal-resistant mounting.' ),
                array( 'step' => '03', 'title' => 'AI Calibration',   'desc' => 'Detection zones and alert rules are tuned to your property, minimizing false alarms over a two-week calibration period.' ),
                array( 'step' => '04', 'title' => 'Monitoring Setup', 'desc' => 'Optional professional monitoring is activated and you receive training on the app, alerts and emergency protocols.' ),
            ),
            'faqs' => array(
                array( 'q' => 'Are the cameras always recording, or only on motion?', 'a' => 'You choose. We support continuous 24/7 recording to a local NVR with 30+ days of storage, or event-based recording that captures clips only when the AI detects a person or vehicle. Most clients use a hybrid approach.' ),
                array( 'q' => 'Can I grant access to guests or service providers remotely?', 'a' => 'Yes. The system supports temporary access codes and scheduled entry windows. You can issue a code valid for a single afternoon or a recurring weekly window for a cleaner, all managed from the app.' ),
                array( 'q' => 'What happens if the power or internet goes out?', 'a' => 'Our systems include battery backup for cameras and network equipment, plus local recording that continues during outages. Cellular backup is available for properties where connectivity is critical.' ),
            ),
            'meta_description' => 'Hyvoxa security and surveillance systems combine 4K cameras, AI threat detection, smart locks and remote monitoring to protect your home intelligently.',
        ),
        array(
            'slug'      => 'home-entertainment',
            'title'     => 'Home Entertainment',
            'menu_icon' => 'dashicons-format-video',
            'icon'      => 'clapperboard',
            'short'     => 'Cinema-grade audio and video in every room.',
            'tagline'   => 'Your home, the best seat in the house',
            'image'     => 'https://images.pexels.com/photos/13348768/pexels-photo-13348768.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Hyvoxa designs and installs whole-home entertainment systems that bring cinema-quality sound and video to every room. From a dedicated reference-grade theater to invisible in-ceiling speakers that fill your home with music, every system is calibrated to your space and tuned to your taste.',
            'intro'     => 'Hyvoxa designs and installs whole-home entertainment systems that bring cinema-quality sound and video to every room. From a dedicated reference-grade theater to invisible in-ceiling speakers that fill your home with music, every system is calibrated to your space and tuned to your taste.',
            'benefits' => array(
                array( 'title' => 'Reference Theater Design',  'desc' => 'Acoustic treatment, calibrated projection and immersive surround sound deliver a theater experience that surpasses commercial cinemas.' ),
                array( 'title' => 'Multi-Room Audio',          'desc' => 'Stream different sources to every room simultaneously, or sync the whole house for a party in seconds.' ),
                array( 'title' => 'Invisible Speakers',        'desc' => 'In-ceiling and in-wall architectural speakers deliver full-range sound without a single visible component.' ),
                array( 'title' => 'One-Touch Control',         'desc' => 'A single remote or app controls TV, audio, lighting and shades together, so movie night starts with one tap.' ),
            ),
            'features' => array(
                'Dedicated home theater design and calibration',
                'Dolby Atmos and DTS:X immersive audio',
                'Multi-room distributed audio systems',
                '4K HDR and 8K projection systems',
                'In-ceiling and architectural invisible speakers',
                'Acoustic treatment and sound isolation',
            ),
            'process' => array(
                array( 'step' => '01', 'title' => 'Acoustic Design',      'desc' => 'We model your room for speaker placement, reflection points and bass response, then specify treatment for reference performance.' ),
                array( 'step' => '02', 'title' => 'Equipment Selection',  'desc' => 'Projectors, speakers, amplification and seating are chosen to match your budget and aesthetic, with no compromise on performance.' ),
                array( 'step' => '03', 'title' => 'Calibration',          'desc' => 'Using professional measurement tools, we tune every channel for frequency response, time alignment and reference SPL.' ),
                array( 'step' => '04', 'title' => 'Integration',          'desc' => 'The theater is tied into your lighting, climate and security so a single scene dims the lights, drops the shades and starts the film.' ),
            ),
            'faqs' => array(
                array( 'q' => 'How much space do I need for a dedicated home theater?', 'a' => 'A comfortable dedicated theater needs a room at least 4 meters long and 3 meters wide, though we design for spaces both larger and smaller. For multi-room audio, no dedicated space is needed at all.' ),
                array( 'q' => 'Can I stream my existing services like Netflix and Spotify?', 'a' => 'Yes. All our systems integrate with major streaming platforms, and we can set up universal search across your library so you find content regardless of which service hosts it.' ),
                array( 'q' => 'Do the speakers have to be visible?', 'a' => 'No. We specialize in architectural speakers that sit flush with ceiling and wall surfaces, paintable to match your finish. For dedicated theaters, in-wall speakers behind acoustically transparent screens are standard.' ),
            ),
            'meta_description' => 'Hyvoxa home entertainment systems deliver cinema-grade Dolby Atmos theaters, multi-room audio and invisible architectural speakers calibrated to your space.',
        ),
        array(
            'slug'      => 'voice-automation',
            'title'     => 'Voice & App Control',
            'menu_icon' => 'dashicons-microphone',
            'icon'      => 'mic',
            'short'     => 'Your home, at your command.',
            'tagline'   => 'Speak, and your home responds',
            'image'     => 'https://images.pexels.com/photos/1666313/pexels-photo-1666313.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Hyvoxa voice and app control puts your entire home behind a single, effortless interface. Whether you prefer to speak a command, tap a keypad or open an app, every system responds instantly and consistently, because one intelligent processor orchestrates everything behind the scenes.',
            'intro'     => 'Hyvoxa voice and app control puts your entire home behind a single, effortless interface. Whether you prefer to speak a command, tap a keypad or open an app, every system responds instantly and consistently, because one intelligent processor orchestrates everything behind the scenes.',
            'benefits' => array(
                array( 'title' => 'Natural Voice Control',  'desc' => 'Complex multi-device commands work with a single phrase. Say goodnight and the lights, locks, thermostat and alarm respond together.' ),
                array( 'title' => 'Unified App Experience', 'desc' => 'One polished app controls lighting, climate, security, entertainment and more, with no switching between manufacturer apps.' ),
                array( 'title' => 'Custom Keypads',         'desc' => 'Beautifully designed physical keypads placed where you actually need them, each button programmed for the scene that matters there.' ),
                array( 'title' => 'Guest Access',           'desc' => 'Grant family and visitors limited control with simple permissions, so the babysitter can dim lights but not disarm the alarm.' ),
            ),
            'features' => array(
                'Alexa, Google Assistant and Siri integration',
                'Custom Hyvoxa app for iOS and Android',
                'Programmable architectural keypads',
                'Apple Watch and widget control',
                'Scene and routine builder',
                'Multi-user permission management',
            ),
            'process' => array(
                array( 'step' => '01', 'title' => 'Control Audit',  'desc' => 'We map every system you want to control and design the voice phrases, app layout and keypad placement around your habits.' ),
                array( 'step' => '02', 'title' => 'Platform Setup', 'desc' => 'The central processor is programmed, voice assistants are linked, and the custom app is configured for your exact home.' ),
                array( 'step' => '03', 'title' => 'Scene Design',   'desc' => 'We build and test the routines that matter most to you, from morning wake-up to away mode to entertainment night.' ),
                array( 'step' => '04', 'title' => 'Training',       'desc' => 'You receive a hands-on walkthrough and a personalized quick-reference guide so every family member feels confident.' ),
            ),
            'faqs' => array(
                array( 'q' => 'Which voice assistants do you support?', 'a' => 'We integrate with Amazon Alexa, Google Assistant and Apple Siri/HomeKit. You can use one or all three simultaneously, and we can recommend the best fit for your ecosystem during the design phase.' ),
                array( 'q' => 'Is voice control reliable for complex commands?', 'a' => 'Yes, because the logic lives on your local processor rather than in the cloud. When you say goodnight, the processor executes a pre-programmed scene instantly, regardless of internet speed.' ),
                array( 'q' => 'Can I still control everything manually?', 'a' => 'Always. Physical keypads, switches and the app all work independently. Voice is a convenience layer on top of reliable physical control, never a replacement for it.' ),
            ),
            'meta_description' => 'Hyvoxa voice and app control unifies your entire smart home behind natural voice commands, a polished app and custom keypads, all processed locally.',
        ),
        array(
            'slug'      => 'outdoor-automation',
            'title'     => 'Outdoor & Garden',
            'menu_icon' => 'dashicons-palmtree',
            'icon'      => 'trees',
            'short'     => 'Smart systems that extend beyond your walls.',
            'tagline'   => 'Intelligence, from front gate to garden path',
            'image'     => 'https://images.pexels.com/photos/37720375/pexels-photo-37720375.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Hyvoxa outdoor automation brings the same intelligence you enjoy indoors into your garden, pool and exterior spaces. Weather-aware irrigation, landscape lighting, motorized gates and pool controls all integrate seamlessly, so your outdoor living is as effortless as your indoor comfort.',
            'intro'     => 'Hyvoxa outdoor automation brings the same intelligence you enjoy indoors into your garden, pool and exterior spaces. Weather-aware irrigation, landscape lighting, motorized gates and pool controls all integrate seamlessly, so your outdoor living is as effortless as your indoor comfort.',
            'benefits' => array(
                array( 'title' => 'Weather-Aware Irrigation',  'desc' => 'Sprinklers skip cycles before rain arrives and adjust durations by season, cutting water waste by up to 50%.' ),
                array( 'title' => 'Landscape Lighting Scenes', 'desc' => 'Path lights, uplighting and water features transition from welcoming evening to dramatic entertaining to security mode automatically.' ),
                array( 'title' => 'Pool & Spa Control',        'desc' => 'Heat the pool, adjust jets and manage cleaning cycles from the same app that runs your home, all on your schedule.' ),
                array( 'title' => 'Gate & Access Automation',  'desc' => 'Motorized gates with intercom, keypad and app entry keep your perimeter secure while making access effortless for family.' ),
            ),
            'features' => array(
                'Smart irrigation with weather integration',
                'Landscape and architectural lighting control',
                'Motorized gate and barrier integration',
                'Pool, spa and water feature automation',
                'Outdoor speakers and entertainment zones',
                'Path and driveway motion-activated lighting',
            ),
            'process' => array(
                array( 'step' => '01', 'title' => 'Site Survey',         'desc' => 'We walk your property to map irrigation zones, lighting opportunities, access points and entertainment areas.' ),
                array( 'step' => '02', 'title' => 'Infrastructure',      'desc' => 'Weather-rated cabling and controllers are installed with minimal disruption to existing landscaping.' ),
                array( 'step' => '03', 'title' => 'Scene Programming',   'desc' => 'Lighting, irrigation and water features are scheduled and tied to sensors, weather data and your routines.' ),
                array( 'step' => '04', 'title' => 'Seasonal Tuning',     'desc' => 'We return each season to adjust irrigation durations, lighting scenes and schedules as the year changes.' ),
            ),
            'faqs' => array(
                array( 'q' => 'Can the irrigation system really save water?', 'a' => 'Yes, significantly. By integrating live weather data and soil moisture sensors, our systems avoid watering before or after rain and adjust volume by season. Most clients reduce outdoor water use by 30-50%.' ),
                array( 'q' => 'Are the outdoor components weatherproof?', 'a' => 'Every component we install outdoors carries a proper IP weather rating for your climate, from lighting fixtures to speakers to control panels. All cabling is rated for direct burial where applicable.' ),
                array( 'q' => 'Can I control the garden from inside the house?', 'a' => 'Of course. Outdoor systems are part of the same Hyvoxa platform, so you can turn on path lights, start the irrigation or heat the pool from the app, a keypad or voice, regardless of where you are.' ),
            ),
            'meta_description' => 'Hyvoxa outdoor automation extends smart control to irrigation, landscape lighting, gates, pool and garden entertainment with weather-aware efficiency.',
        ),
    );
}

/**
 * Return all blog posts data.
 */
function hyvoxa_blog_posts_data() {
    return array(
        array(
            'slug'      => 'complete-guide-to-smart-home-automation',
            'title'     => 'The Complete Guide to Smart Home Automation in 2025',
            'category'  => 'Getting Started',
            'read_time' => '12 min',
            'date'      => '2025-01-14 10:00:00',
            'author'    => 'Hyvoxa Design Team',
            'image'     => 'https://images.pexels.com/photos/16423104/pexels-photo-16423104.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Everything you need to know before automating your home, from choosing the right platform to designing scenes that genuinely improve daily life.',
            'content'   => "## What smart home automation really means\n\nSmart home automation is not about collecting gadgets. It is about creating a home that responds to you, anticipates your needs and removes friction from your daily routines. A truly automated home does not require you to open an app to turn off the lights; it already knows you left the room.\n\nThe distinction between a connected home and an automated home is the most important concept to understand before you start. A connected home gives you remote control of individual devices. An automated home uses a central processor to coordinate those devices based on schedules, sensors and your behavior, so the house acts on its own.\n\n## Choosing the right control platform\n\nThe platform is the brain of your system. It determines what devices you can integrate, how reliably they communicate and how complex your automations can become. The three paths most homeowners consider are voice-ecosystem hubs, manufacturer-specific apps and professional control systems.\n\nVoice ecosystems like Alexa and Google Assistant are accessible and affordable, but they depend on cloud processing and struggle with multi-device scenes. Manufacturer apps work well within a single brand but create silos when you mix brands. A professional control system, which is what Hyvoxa installs, processes everything locally for instant response and can coordinate any device regardless of manufacturer.\n\n## Starting with lighting, the foundation\n\nLighting is the best starting point for automation because the impact is immediate and universal. Every person in your home uses lights every day. When lighting becomes automated, the value of the entire system becomes obvious to everyone, not just the tech enthusiast who set it up.\n\nBegin with scenes rather than individual lights. A scene coordinates multiple fixtures to a specific purpose: a cooking scene brightens the kitchen, a dining scene warms it, a movie scene dims it. When your family can tap one button or say one phrase to transform a room, automation stops feeling like a novelty and starts feeling essential.\n\n## Adding climate and security layers\n\nOnce lighting is in place, climate and security are the natural next layers. Climate automation pays for itself through energy savings while improving comfort, and security provides peace of mind that no other home improvement can match.\n\nThe key to both layers is sensors. Occupancy sensors tell the climate system which rooms are in use. Door and window sensors tell the security system the status of every entry point. Motion and glass-break sensors add awareness. The more your home can sense, the more intelligently it can act.\n\n## Designing scenes that genuinely improve life\n\nThe most common mistake in home automation is programming scenes that look impressive in a demo but never get used in real life. A scene is only valuable if it maps to something you actually do regularly. The best way to design scenes is to observe your routines for a week and note the moments where you interact with multiple devices at once.\n\nThe morning routine is a classic example. A well-designed wake-up scene gradually raises lights over ten minutes, adjusts the thermostat to your daytime preference, starts the coffee maker and reads your calendar briefing through a speaker. That scene saves you four or five separate actions every morning, and that compounded convenience is the real return on automation.\n\n## Avoiding the most common pitfalls\n\nFirst, avoid cloud dependency for core functions. If your lights only work when the internet is up, your home is less reliable than it was before automation. Insist on local processing for anything you need to rely on.\n\nSecond, avoid fragmentation. Mixing five different manufacturer apps creates a disjointed experience that no one in the household will fully adopt. A unified platform with a single app and consistent voice control is what turns a collection of devices into a smart home.\n\nThird, avoid over-automation. Not everything benefits from a sensor or a schedule. A drawer that opens when you approach is a gimmick; a hallway light that turns on at 20% brightness when you walk to the bathroom at night is genuinely useful. Always ask whether the automation removes friction or adds complexity.\n\n## Planning for the future\n\nA well-designed automation system is extensible. Start with the rooms and functions that matter most, and ensure your control platform and wiring infrastructure can accommodate additions. Running conduit to key locations during initial installation costs very little but saves enormous expense when you want to add a camera, a sensor or a speaker later.\n\nAt Hyvoxa, we design every system with a five-year horizon in mind. The devices may change, but the infrastructure and control platform should remain solid, so your home keeps getting smarter rather than needing to be rebuilt.",
        ),
        array(
            'slug'      => 'how-smart-lighting-saves-energy',
            'title'     => 'How Smart Lighting Can Cut Your Energy Bill by 40%',
            'category'  => 'Energy Efficiency',
            'read_time' => '8 min',
            'date'      => '2025-02-03 09:00:00',
            'author'    => 'Hyvoxa Engineering',
            'image'     => 'https://images.pexels.com/photos/6487954/pexels-photo-6487954.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Occupancy sensors, daylight harvesting and circadian scheduling are not just luxury features. They are proven energy-saving strategies with real ROI.',
            'content'   => "## The hidden cost of forgotten lights\n\nThe average household leaves lights on in empty rooms for over three hours per day. Across a year, that wasted energy adds up to a significant portion of your electricity bill, and it is entirely preventable with automation that most homeowners never consider.\n\nSmart lighting eliminates this waste not by changing your behavior, but by removing the need for it. Occupancy sensors turn lights off when a room is empty. Daylight sensors dim lights when natural light is sufficient. Schedules ensure exterior lights never run during daylight hours. None of these require you to remember anything.\n\n## Occupancy sensing, the biggest single win\n\nOccupancy sensors are the highest-ROI component in any lighting automation system. They use passive infrared or ultrasonic detection to know when a space is in use, and they turn lights off after a configurable delay once the space is empty.\n\nThe key is choosing the right sensor technology for each space. PIR sensors work well in offices and hallways with clear sightlines. Ultrasonic sensors are better for bathrooms and spaces with partitions, because they detect motion around corners. In large open spaces, dual-technology sensors combine both methods for reliable detection without false offs.\n\n## Daylight harvesting explained\n\nDaylight harvesting uses a photosensor to measure ambient natural light and automatically dims artificial lighting to maintain a target brightness level. On a bright afternoon near a window, your lights might run at 20% or turn off entirely. On an overcast evening, they ramp up to full brightness without you noticing the transition.\n\nThis strategy is most effective in spaces with large windows or skylights, where natural light varies dramatically throughout the day. Combined with tunable-white fixtures, daylight harvesting also maintains comfortable color temperature, shifting cooler as the sun is high and warmer as it sets.\n\n## Circadian scheduling for efficiency and health\n\nCircadian lighting follows the natural progression of daylight, starting with warm low-intensity light in the morning, shifting to bright cool light at midday and returning to warm dim light in the evening. This schedule is not just about energy; it supports your biological rhythms and improves sleep quality.\n\nFrom an efficiency perspective, circadian scheduling means your lights rarely run at full intensity except during the brightest part of the day, when natural light is also contributing. The cumulative energy reduction from running at 60% instead of 100% for much of the evening is substantial.\n\n## Measuring real savings\n\nA typical Hyvoxa lighting installation in a four-bedroom home reduces lighting energy consumption by 30-40% compared to the same home with conventional switching. The exact figure depends on occupancy patterns, window exposure and how aggressively schedules and sensors are configured.\n\nWhen you factor in the extended lifespan of LED fixtures that are dimmed rather than run at full power, the total cost of ownership often drops even after accounting for the automation investment. In commercial settings the payback period is typically under three years; in homes it is longer but the comfort and convenience benefits make the investment worthwhile regardless.\n\n## Getting started efficiently\n\nIf you are considering lighting automation primarily for energy savings, start with the rooms where lights are most frequently left on: hallways, bathrooms, childrens rooms and exterior spaces. Add occupancy sensors and a daylight-aware schedule, and measure the impact for a month before expanding.\n\nThe data from that initial phase will show you exactly where the savings come from and help you prioritize the next rooms. This incremental approach keeps costs manageable and lets the savings help fund the expansion of the system over time.",
        ),
        array(
            'slug'      => 'securing-your-smart-home',
            'title'     => 'Securing Your Smart Home: A Practical Cybersecurity Guide',
            'category'  => 'Security',
            'read_time' => '10 min',
            'date'      => '2025-02-22 11:00:00',
            'author'    => 'Hyvoxa Security Team',
            'image'     => 'https://images.pexels.com/photos/24346971/pexels-photo-24346971.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'A smart home is only as good as its security. Here is how to protect your automation system from digital threats without sacrificing convenience.',
            'content'   => "## Why smart home security matters\n\nEvery device you add to your home is a potential entry point for an attacker. Cameras, locks, thermostats and voice assistants all connect to networks, and any one of them with a weak default configuration can compromise the privacy and safety of your entire household.\n\nThe good news is that securing a smart home is not mysterious. It follows the same principles as securing any network, and a professionally installed system like the ones Hyvoxa designs includes security as a foundational layer, not an afterthought.\n\n## Segment your network\n\nThe single most effective step you can take is network segmentation. Your smart home devices should not share the same network as your personal computers, phones and tablets. If a compromised camera gives an attacker a foothold, segmentation ensures that foothold cannot reach your banking session.\n\nA segmented approach uses a dedicated VLAN for IoT devices, separate from your main network. Professional routers and access points make this straightforward to configure, and it is standard practice in every Hyvoxa installation. Guest networks are a simpler alternative for smaller setups, though they offer less granular control.\n\n## Replace default credentials immediately\n\nThis cannot be overstated. The vast majority of smart home compromises exploit devices still using factory default usernames and passwords. Attackers scan the internet for these defaults constantly, and a device with unchanged credentials is effectively an open door.\n\nEvery device, from your camera NVR to your smart lock bridge, must receive a unique, strong password during installation. Use a password manager to store these credentials, and enable two-factor authentication on every account that supports it, especially your automation platform and camera cloud accounts.\n\n## Keep firmware updated\n\nFirmware updates patch known vulnerabilities, and known vulnerabilities are exactly what attackers exploit. A device that has not been updated in a year is a device with a years worth of publicly documented security holes.\n\nThe challenge is that many smart home devices do not auto-update, or they update only when you manually approve. A maintenance routine that checks for firmware updates monthly is essential. Professional systems like the ones Hyvoxa installs include centralized update management, so you see all pending updates in one place rather than checking a dozen manufacturer apps.\n\n## Choose local processing over cloud\n\nCloud dependency is both a reliability risk and a security risk. When your home control logic lives on a manufacturer server, a breach of that server exposes your home data and potentially control of your devices. Local processing keeps that logic inside your house, behind your firewall.\n\nThis is why Hyvoxa systems use a local control processor as the primary brain of the home. Cloud services are used for convenience features like remote access and voice assistants, but core automation runs locally. If a cloud service is compromised or discontinued, your home continues to function.\n\n## Secure remote access properly\n\nRemote access, the ability to control your home when you are away, is one of the most valuable features of automation. It is also one of the most commonly exploited. Avoid port forwarding on your router, which exposes devices directly to the internet. Instead, use a VPN or a manufacturer remote service that establishes an encrypted tunnel.\n\nProfessional systems include secure remote access built in, using end-to-end encryption and authenticated tunnels rather than exposed ports. This gives you the convenience of controlling your home from anywhere without the risk of exposing it to the entire internet.\n\n## Audit regularly\n\nSecurity is not a one-time setup; it is an ongoing practice. Every few months, review which devices are on your network, check for firmware updates, review user accounts and access permissions, and remove any devices or accounts that are no longer in use.\n\nA quarterly audit takes less than an hour and catches the small issues, an abandoned camera, a guest account that was never removed, a firmware update that failed silently, before they become real problems. Hyvoxa offers annual security audits as part of our maintenance plans, so this discipline is built into the relationship rather than left to your memory.",
        ),
        array(
            'slug'      => 'voice-control-vs-app-control',
            'title'     => 'Voice Control vs. App Control: Which Is Right for You?',
            'category'  => 'Smart Living',
            'read_time' => '7 min',
            'date'      => '2025-03-10 08:00:00',
            'author'    => 'Hyvoxa Design Team',
            'image'     => 'https://images.pexels.com/photos/4132542/pexels-photo-4132542.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'Both have their place in a well-designed smart home. Understanding when to speak and when to tap is the key to a system that feels effortless.',
            'content'   => "## The false choice\n\nA common debate in home automation treats voice control and app control as competing approaches, as if you must pick one and commit. In reality, the best smart homes use both, plus physical keypads, each in the context where it works best. The question is not which is better, but which is better for this specific interaction.\n\n## Where voice control shines\n\nVoice is unmatched for hands-free, multi-device commands. When you are carrying groceries through the front door, saying welcome home to trigger your arrival scene is far easier than fishing out your phone. When you are already in bed and realize you left the kitchen lights on, a voice command beats walking back downstairs.\n\nVoice also excels for guests and family members who may not have the app configured. A visitor does not need to be onboarded into your system to ask for the lights to be dimmed. This accessibility makes voice an essential layer in any household with more than one person.\n\n## Where app control wins\n\nThe app is superior for anything precise or visual. Setting a specific thermostat temperature, reviewing camera feeds, adjusting individual lights in a room, checking energy usage, these are tasks where you want to see information and make fine adjustments. Voice is clumsy for precision; you cannot easily say set the living room lights to 35% and make them slightly warmer without it feeling like a chore.\n\nThe app is also better for discovery. When you want to see what scenes are available, browse your music library or check which doors are locked, a visual interface is immediately comprehensible in a way a voice response is not. For anything you would describe as browsing or monitoring, the app is the right tool.\n\n## The case for physical keypads\n\nPhysical keypads are the often-overlooked third option, and in a premium installation they are arguably the most important. A keypad placed at an entry point or bedside gives you instant, reliable access to the scenes you use most, without voice, without an app, without any delay.\n\nKeypads are faster than voice for routine scenes, because there is no wake word and no parsing delay. They are more reliable, because they do not depend on microphones or internet. And they are more private, because they do not require you to announce your intentions to a room full of microphones. In every Hyvoxa installation, keypads are the primary control method, with voice and app as convenient supplements.\n\n## Designing for the right interaction\n\nThe principle is simple: match the control method to the context. For a front entry, a keypad with an arrival scene is ideal. For a living room, voice for movie night plus an app for browsing content. For a bedroom, a bedside keypad for goodnight and wake scenes, with voice as backup.\n\nWhen each control method is used where it is strongest, the whole system feels effortless. When voice is forced into tasks it handles poorly, or the app is required for tasks that should be instant, the system feels clunky despite having capable hardware. The design of interactions matters more than the specification of devices.\n\n## Privacy considerations\n\nVoice control always involves microphones listening, and while reputable manufacturers process locally and offer mute switches, some households prefer to limit always-listening devices. The beauty of a multi-modal approach is that voice is optional. If you prefer keypads and app only, the system works perfectly without a single microphone.\n\nThis flexibility is another reason to avoid cloud-locked, voice-only platforms. A Hyvoxa system gives you voice where you want it and silent, private control everywhere else, so your home responds to you on your terms.",
        ),
        array(
            'slug'      => 'future-of-home-automation',
            'title'     => 'The Future of Home Automation: AI, Matter and Beyond',
            'category'  => 'Industry Trends',
            'read_time' => '9 min',
            'date'      => '2025-03-28 14:00:00',
            'author'    => 'Hyvoxa Innovation Lab',
            'image'     => 'https://images.pexels.com/photos/18186205/pexels-photo-18186205.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'From predictive AI routines to the Matter interoperability standard, here is where smart home technology is heading in the next five years.',
            'content'   => "## Where we are today\n\nHome automation in 2025 sits at an inflection point. The building blocks, reliable wireless protocols, voice assistants, capable sensors and affordable processing, are mature and widely available. What separates a basic smart home from a genuinely intelligent one is no longer hardware availability; it is design, integration and software.\n\nTwo forces are shaping the next five years more than any others: the Matter interoperability standard and the integration of predictive artificial intelligence. Together, they promise to make smart homes more open, more capable and more accessible than ever before.\n\n## Matter and the end of protocol wars\n\nMatter is a unified connectivity standard backed by every major player in the industry, from Apple and Google to Amazon and Samsung. Its promise is simple: any Matter-certified device works with any Matter-certified platform, regardless of manufacturer. For consumers, this means an end to checking compatibility charts before buying a smart bulb.\n\nFor the industry, Matter is transformative. It eliminates the fragmentation that has plagued home automation for a decade, where devices using Zigbee, Z-Wave, Wi-Fi and Thread could not speak to each other without expensive bridges. Matter runs over Thread and Wi-Fi, and a single Matter controller can manage devices from dozens of brands through one interface.\n\nHyvoxa has been Matter-ready since the specification stabilized. Our control platforms support Matter natively, which means new devices our clients add in the future will integrate seamlessly, even brands and product categories that do not exist yet.\n\n## Predictive AI and learned routines\n\nThe next leap in automation is not more sensors or faster processors; it is systems that learn. Current automation requires you to define every rule, every scene, every schedule. Predictive AI changes this by observing your behavior and proposing, or silently implementing, routines that match how you actually live.\n\nImagine a home that notices you always dim the lights and lower the thermostat around 10pm on weeknights, and after a week of observation offers to automate that pattern. Or a system that learns your weekend morning routine is different from your weekday routine and adjusts automatically, without you programming two separate schedules.\n\nThe technology for this exists today in early forms. The challenge is doing it well, with privacy preserved and false predictions minimized. At Hyvoxa, we are piloting AI-assisted routine suggestion with selected clients, and expect it to become a standard feature within two years as the models mature.\n\n## Energy intelligence and grid interaction\n\nAs homes increasingly generate and store their own energy through solar and batteries, automation systems are becoming energy-aware in a way that was not possible before. A smart home in 2027 will not just reduce energy use; it will actively manage when energy is consumed to take advantage of solar production, battery storage and time-of-use electricity pricing.\n\nThis means your home might pre-cool the house during peak solar production, run the dishwasher when battery storage is full, or defer EV charging to off-peak hours, all automatically. The savings from this intelligent scheduling can be significant, and it requires no behavior change from you.\n\n## Health and wellness integration\n\nSensors that monitor air quality, humidity, lighting quality and even sleep patterns are becoming standard in premium installations. The next step is connecting these sensors to actuation, so the home actively maintains a healthy environment rather than simply reporting on it.\n\nIf CO2 levels rise in a bedroom overnight, the system triggers ventilation. If humidity climbs in a bathroom after a shower, the exhaust fan runs until levels normalize. If the light in a childs study area is insufficient for reading, the desk lamp brightens automatically. These small, continuous adjustments add up to a measurably healthier indoor environment.\n\n## Preparing your home today\n\nThe most important thing you can do to future-proof your home is invest in infrastructure. Conduit, wired network backbones and a capable control platform will outlast any specific device. Devices will be replaced every five to ten years, but the infrastructure and platform should serve you for decades.\n\nChoose a platform that is Matter-ready and committed to open standards, so you are never locked into a single manufacturer. Insist on local processing for core functions, so your home remains functional and private. And work with an integrator who designs for evolution, not just for the initial installation, because the smart home of 2030 will look very different from the smart home of 2025, and the homes that adapt most easily will be the ones that were built to adapt from the start.",
        ),
        array(
            'slug'      => 'designing-the-perfect-home-theater',
            'title'     => 'Designing the Perfect Home Theater: A Room-by-Room Guide',
            'category'  => 'Entertainment',
            'read_time' => '11 min',
            'date'      => '2025-04-15 13:00:00',
            'author'    => 'Hyvoxa Theater Design',
            'image'     => 'https://images.pexels.com/photos/13378811/pexels-photo-13378811.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
            'excerpt'   => 'A great home theater is not about buying the most expensive equipment. It is about matching the room, the gear and the calibration to how you watch.',
            'content'   => "## The room comes first\n\nThe most common mistake in home theater design is choosing equipment before considering the room. A 50,000 dollar projector in a room with hard reflective walls and no acoustic treatment will sound and look worse than a 5,000 dollar system in a properly designed space. The room is the foundation; everything else builds on it.\n\nStart with the rooms geometry. A rectangular room with dimensions that are not exact multiples of each other will have more even bass response than a square room, which tends to have severe resonances. If you are building from scratch, choose your dimensions deliberately. If you are working with an existing room, acoustic treatment can mitigate most problems.\n\n## Acoustic treatment, not decoration\n\nAcoustic treatment is the single highest-impact investment in a home theater, and it is the element most often skipped. Without treatment, sound reflects off hard surfaces and arrives at your ears slightly delayed, smearing dialogue and blurring the precise imaging that makes a good soundtrack immersive.\n\nTreatment falls into two categories: absorption, which uses porous panels to reduce reflection, and diffusion, which scatters reflections evenly. A well-treated room uses absorption at first reflection points, the spots on the side walls and ceiling where sound bounces directly to the listening position, and diffusion on the rear wall to maintain a sense of space without slap-back echo.\n\nBass management is the other critical element. Low frequencies build up in room corners, creating boomy, uneven bass. Bass traps in the corners tame these buildups and deliver the tight, controlled low end that makes action sequences impactful rather than overwhelming.\n\n## Speaker placement for immersive audio\n\nDolby Atmos and DTS:X have transformed home theater audio by adding height channels, creating a three-dimensional sound field that places sounds above and around you. The standard configuration for a dedicated theater is 7.2.4: seven ear-level channels, two subwoofers and four height channels.\n\nEar-level speakers should be placed at the same height as the listeners ears when seated, typically around 1.2 meters. Left and right speakers form an equilateral triangle with the primary listening position. Surround speakers sit slightly behind the listening position, and rear surrounds complete the circle. Height speakers are mounted on or in the ceiling, or using upward-firing modules if ceiling installation is not possible.\n\nTwo subwoofers, rather than one, are worth the investment because they smooth out the bass response across multiple seating positions. A single subwoofer creates peaks and nulls that vary by seat; dual subwoofers, properly placed, deliver consistent bass to every chair.\n\n## Projection and screen selection\n\nFor a dedicated theater, projection is the right choice. Modern 4K projectors deliver image quality that rivals high-end televisions at sizes that no TV can match, and 8K projection is becoming accessible for those who want to future-proof. The screen size should be determined by your seating distance, not by the largest screen available.\n\nA common guideline is that the screen height should fill approximately one-sixth of the viewing distance. For a 4-meter viewing distance, a screen around 1.5 meters tall, roughly a 120-inch diagonal, is comfortable. Going larger can be immersive but may cause eye strain during bright scenes. Screen material matters too; in a fully darkened room, a white screen is ideal. In a room with some ambient light, a gray or ambient-light-rejecting screen preserves contrast.\n\n## Calibration, the step that makes it real\n\nProfessional calibration is what separates a collection of good equipment from a reference-quality theater. Every room interacts with speakers and projectors differently, and without measurement and adjustment, you are hearing and seeing the rooms interpretation of the signal rather than the signal itself.\n\nCalibration involves measuring frequency response at each listening position with a calibrated microphone, then adjusting equalization, crossover frequencies, time alignment and levels so every channel matches. Video calibration adjusts the projectors color, gamma and brightness to reference standards, so the image you see matches what the filmmaker intended.\n\n## Integration with the rest of your home\n\nA home theater becomes genuinely magical when it is integrated with your home automation system. A single movie scene dims the lights to 5%, drops the shades, sets the projector and audio to the correct inputs, and adjusts the climate so the room stays comfortable with a full audience. When the film ends, the lights gently rise.\n\nThis integration is where Hyvoxa adds the most value to a theater project. The audiovisual equipment is the content; the automation is the experience. When pressing one button transforms your room into a cinema, you use the theater more often, and that is the ultimate measure of a successful installation.",
        ),
    );
}

/**
 * Return all legal documents data.
 */
function hyvoxa_legal_data() {
    return array(
        array(
            'slug'         => 'privacy-policy',
            'title'        => 'Privacy Policy',
            'last_updated' => 'January 1, 2025',
            'intro'        => 'This Privacy Policy explains how Hyvoxa collects, uses, and protects information when you visit our website or engage our services. We are committed to transparency and to giving you control over your personal data.',
            'sections' => array(
                array( 'heading' => 'Information We Collect', 'body' => array(
                    'We collect information that you provide directly to us, such as your name, email address, phone number, and property details when you contact us or request a consultation. We also collect limited technical information automatically when you visit our website, including your IP address, browser type, device information, and pages visited.',
                    'When you become a client, we may collect additional information relevant to delivering our services, including property layout, system specifications, and access credentials for devices we install and maintain. This information is collected only with your explicit consent and is used solely for the purpose of providing and supporting your installation.',
                ) ),
                array( 'heading' => 'How We Use Your Information', 'body' => array(
                    'We use your personal information to respond to your inquiries, schedule and deliver consultations and installations, provide ongoing support and maintenance for your systems, send you service updates and important notifications, and improve our website, services, and customer experience.',
                    'We do not sell your personal information to third parties under any circumstances. We may share limited information with trusted service providers who assist us in operating our business, such as hosting providers and accounting services, under contractual obligations of confidentiality.',
                ) ),
                array( 'heading' => 'Cookies and Tracking Technologies', 'body' => array(
                    'Our website uses cookies and similar technologies to understand how visitors use our site and to remember your preferences. We use essential cookies that are necessary for the site to function, and optional analytics cookies that help us improve our content and performance.',
                    'You can control cookies through your browser settings. Disabling all cookies may affect some features of our website. We do not use cookies for targeted advertising.',
                ) ),
                array( 'heading' => 'Data Security', 'body' => array(
                    'We implement industry-standard technical and organizational measures to protect your personal information, including encrypted data transmission, secure access controls, and regular security reviews. No method of transmission over the internet is completely secure, but we work to protect your information using reasonable and appropriate safeguards.',
                    'In the event of a data breach that is likely to result in a risk to your rights and freedoms, we will notify you and the relevant authorities within the timeframe required by applicable law.',
                ) ),
                array( 'heading' => 'Data Retention', 'body' => array(
                    'We retain your personal information only for as long as necessary to fulfill the purposes for which it was collected, including legal, accounting, and reporting requirements. Client records are retained for the duration of our service relationship and for a reasonable period thereafter to support warranty and service obligations.',
                    'You may request deletion of your personal information at any time, subject to our legitimate need to retain certain records for legal or contractual purposes.',
                ) ),
                array( 'heading' => 'Your Rights', 'body' => array(
                    'Depending on your location, you may have the right to access the personal information we hold about you, request correction of inaccurate information, request deletion of your data, object to or restrict certain processing, and request a copy of your data in a portable format.',
                    'To exercise any of these rights, contact us at hyvoxa@gmail.com. We will respond to your request within 30 days.',
                ) ),
                array( 'heading' => 'Third-Party Links', 'body' => array(
                    'Our website may contain links to third-party websites that we do not control. We are not responsible for the privacy practices or content of these external sites. We encourage you to review the privacy policies of any website you visit.',
                ) ),
                array( 'heading' => 'Changes to This Policy', 'body' => array(
                    'We may update this Privacy Policy from time to time to reflect changes in our practices, legal requirements, or operational needs. We will post the updated policy on this page and revise the last updated date at the top. We encourage you to review this page periodically.',
                ) ),
                array( 'heading' => 'Contact Us', 'body' => array(
                    'If you have questions about this Privacy Policy or our data practices, please contact us at hyvoxa@gmail.com.',
                ) ),
            ),
        ),
        array(
            'slug'         => 'terms-of-service',
            'title'        => 'Terms of Service',
            'last_updated' => 'January 1, 2025',
            'intro'        => 'These Terms of Service govern your use of the Hyvoxa website and the services we provide. By accessing our website or engaging our services, you agree to these terms. Please read them carefully.',
            'sections' => array(
                array( 'heading' => 'Acceptance of Terms', 'body' => array(
                    'By accessing and using this website, you accept and agree to be bound by these Terms of Service. If you do not agree with any part of these terms, you should not use our website or engage our services.',
                ) ),
                array( 'heading' => 'Services Description', 'body' => array(
                    'Hyvoxa provides smart home automation design, installation, integration, and maintenance services. The specific scope of services for each client is defined in a separate service agreement or proposal that is agreed upon before work begins.',
                    'These terms govern general use of our website and form the baseline for our client relationships. Any service agreement signed with Hyvoxa takes precedence over these terms in cases of conflict regarding service-specific matters.',
                ) ),
                array( 'heading' => 'Website Use', 'body' => array(
                    'You agree to use our website only for lawful purposes and in a manner that does not infringe the rights of others or restrict their use of the site. You must not attempt to gain unauthorized access to any part of the website, its servers, or databases.',
                    'All content on this website, including text, graphics, logos, images, and design, is the property of Hyvoxa or its content creators and is protected by intellectual property laws. You may not reproduce, distribute, or create derivative works from our content without prior written permission.',
                ) ),
                array( 'heading' => 'Consultations and Quotes', 'body' => array(
                    'Consultation requests submitted through our website or by email are not binding agreements. A consultation is scheduled only when confirmed by a Hyvoxa representative. Quotes and proposals provided after a consultation are valid for 30 days unless otherwise stated.',
                    'Information provided on our website regarding services, capabilities, and pricing is general in nature and may not reflect the specific requirements of your project. Final scope, timeline, and pricing are determined through a written agreement after an on-site assessment.',
                ) ),
                array( 'heading' => 'Service Agreements and Warranties', 'body' => array(
                    'All installation and integration services are governed by a separate written service agreement that specifies scope, timeline, payment terms, and warranty coverage. Equipment warranties are provided by the respective manufacturers and are subject to their terms.',
                    'Hyvoxa warrants its installation workmanship for a period of two years from the date of completion. This warranty does not cover damage caused by misuse, modifications by third parties, or normal wear and tear.',
                ) ),
                array( 'heading' => 'Limitation of Liability', 'body' => array(
                    'To the maximum extent permitted by law, Hyvoxa shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of our website or services. Our total liability for any claim arising from our services shall not exceed the amount you paid for the specific service giving rise to the claim.',
                    'We do not guarantee that our website will be uninterrupted, error-free, or secure. We are not responsible for any damage to your device or loss of data resulting from your use of the website.',
                ) ),
                array( 'heading' => 'Indemnification', 'body' => array(
                    'You agree to indemnify and hold Hyvoxa harmless from any claims, damages, losses, or expenses, including legal fees, arising from your misuse of our website or violation of these terms.',
                ) ),
                array( 'heading' => 'Governing Law', 'body' => array(
                    'These terms are governed by the laws of the jurisdiction in which Hyvoxa is registered, without regard to conflict of law principles. Any disputes arising from these terms or your use of our website shall be resolved in the courts of that jurisdiction.',
                ) ),
                array( 'heading' => 'Changes to These Terms', 'body' => array(
                    'We may revise these Terms of Service at any time. The most current version will always be posted on this page with an updated revision date. Your continued use of our website after changes are posted constitutes acceptance of the revised terms.',
                ) ),
                array( 'heading' => 'Contact', 'body' => array(
                    'For questions about these Terms of Service, contact us at hyvoxa@gmail.com.',
                ) ),
            ),
        ),
        array(
            'slug'         => 'cookie-policy',
            'title'        => 'Cookie Policy',
            'last_updated' => 'January 1, 2025',
            'intro'        => 'This Cookie Policy explains what cookies are, how Hyvoxa uses them, and the choices you have regarding their use. This policy should be read alongside our Privacy Policy for a complete picture of how we handle your data.',
            'sections' => array(
                array( 'heading' => 'What Are Cookies', 'body' => array(
                    'Cookies are small text files placed on your device when you visit a website. They allow the website to recognize your device and remember information about your visit, such as your preferences and how you navigated the site. Cookies are widely used to make websites work efficiently and to provide information to site owners.',
                ) ),
                array( 'heading' => 'Types of Cookies We Use', 'body' => array(
                    'Essential cookies are necessary for the basic functionality of our website. They enable core features such as page navigation and access to secure areas. The website cannot function properly without these cookies.',
                    'Analytics cookies help us understand how visitors interact with our website by collecting and reporting information anonymously. This data allows us to improve our content, structure, and performance over time.',
                    'Preference cookies remember choices you make, such as language or region, to provide a more personalized experience on subsequent visits.',
                    'We do not use advertising cookies or tracking cookies that follow you across other websites.',
                ) ),
                array( 'heading' => 'How Long Cookies Remain', 'body' => array(
                    'Session cookies are temporary and are deleted from your device when you close your browser. They are used to enable functionality during a single visit.',
                    'Persistent cookies remain on your device for a set period or until you manually delete them. They are used to remember your preferences across visits. The specific retention period for each persistent cookie is set when it is created and typically ranges from a few days to one year.',
                ) ),
                array( 'heading' => 'Managing Cookies', 'body' => array(
                    'You can control and delete cookies through your browser settings. Most browsers allow you to refuse all cookies or to accept only essential ones. Each browser manages cookies differently, so you should consult the help documentation for your specific browser.',
                    'Disabling essential cookies may prevent parts of our website from functioning. Disabling analytics cookies will not affect website functionality but will limit our ability to understand and improve site performance.',
                ) ),
                array( 'heading' => 'Third-Party Services', 'body' => array(
                    'We may use third-party analytics services that set their own cookies to measure website performance. These services have their own privacy policies governing how they use the information collected. We do not control these third-party cookies and recommend reviewing their policies for more information.',
                ) ),
                array( 'heading' => 'Updates to This Policy', 'body' => array(
                    'We may update this Cookie Policy to reflect changes in technology, regulation, or our practices. Updates will be posted on this page with a revised date. We encourage you to review this policy periodically.',
                ) ),
                array( 'heading' => 'Contact', 'body' => array(
                    'For questions about our use of cookies, contact us at hyvoxa@gmail.com.',
                ) ),
            ),
        ),
        array(
            'slug'         => 'disclaimer',
            'title'        => 'Disclaimer',
            'last_updated' => 'January 1, 2025',
            'intro'        => 'The information provided by Hyvoxa on this website is for general informational purposes only. The following disclaimer outlines the limits of that information and the basis on which it is provided.',
            'sections' => array(
                array( 'heading' => 'General Information Only', 'body' => array(
                    'All content on this website, including service descriptions, technical information, blog articles, and guides, is provided in good faith for general information and educational purposes. It does not constitute professional advice specific to your property, circumstances, or requirements.',
                    'Smart home automation involves electrical, network, and building systems that vary significantly between properties. Any information on this website should not be relied upon as a substitute for a professional on-site assessment and consultation.',
                ) ),
                array( 'heading' => 'No Warranty of Accuracy', 'body' => array(
                    'While we strive to keep all information on this website accurate and up to date, we make no warranties or representations of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability of the information, products, services, or related graphics contained on the website.',
                    'Technical specifications, compatibility information, and industry practices change frequently. Any reliance you place on such information is strictly at your own risk.',
                ) ),
                array( 'heading' => 'Service Outcomes', 'body' => array(
                    'Statements regarding energy savings, performance improvements, or other benefits of smart home automation are based on typical results and past project experience. Actual results vary depending on property characteristics, system configuration, usage patterns, and other factors specific to each installation.',
                    'We do not guarantee specific savings figures, performance metrics, or outcomes for any individual project unless stated in a signed service agreement.',
                ) ),
                array( 'heading' => 'External Links', 'body' => array(
                    'Our website may contain links to external websites that are not provided or maintained by Hyvoxa. We do not guarantee the accuracy, relevance, timeliness, or completeness of any information on these external websites.',
                ) ),
                array( 'heading' => 'Professional Disclaimer', 'body' => array(
                    'The blog articles and guides on our website are written to inform and educate. They do not replace the expertise and judgment of qualified professionals. Electrical work, network configuration, and structural modifications should always be performed by licensed and qualified personnel.',
                ) ),
                array( 'heading' => 'Limitation of Liability', 'body' => array(
                    'Under no circumstances shall Hyvoxa be liable for any loss or damage arising from the use of or reliance on any information provided on this website. Your use of the website and any reliance on its content is solely at your own risk.',
                ) ),
                array( 'heading' => 'Contact', 'body' => array(
                    'If you have questions about this disclaimer, contact us at hyvoxa@gmail.com.',
                ) ),
            ),
        ),
        array(
            'slug'         => 'refund-policy',
            'title'        => 'Refund and Cancellation Policy',
            'last_updated' => 'January 1, 2025',
            'intro'        => 'This policy outlines the terms under which Hyvoxa accepts cancellations and issues refunds for our design, installation, and maintenance services. We aim to be fair and transparent in all our client dealings.',
            'sections' => array(
                array( 'heading' => 'Consultation Cancellations', 'body' => array(
                    'Initial consultations may be rescheduled or cancelled at no charge up to 24 hours before the scheduled appointment. Cancellations made less than 24 hours in advance may be subject to a fee to cover travel and preparation costs, which will be communicated at the time of booking.',
                ) ),
                array( 'heading' => 'Design and Proposal Stage', 'body' => array(
                    'Before a service agreement is signed, you may cancel your project at any time with no obligation. Any deposit paid to secure a project slot is fully refundable if you cancel before the agreement is signed and materials are ordered.',
                    'Once a service agreement is signed and materials have been ordered, a cancellation may be subject to charges for non-returnable equipment and any labor already performed. These charges will be itemized and communicated to you before any deduction is made from a refund.',
                ) ),
                array( 'heading' => 'Installation In Progress', 'body' => array(
                    'If a project is cancelled after installation has begun, you are responsible for payment of all labor performed up to the cancellation date and for any materials that have been installed or that cannot be returned to suppliers.',
                    'We will provide a detailed accounting of all work completed and materials used. Any refund due will be processed within 14 business days of the cancellation and final accounting.',
                ) ),
                array( 'heading' => 'Completed Installations', 'body' => array(
                    'Completed installations are governed by the warranty terms in your service agreement. If you experience issues with a completed installation, we will address them under our workmanship warranty, which covers installation quality for two years from completion.',
                    'Refunds for completed installations are considered on a case-by-case basis in the event of documented failure to meet agreed specifications. In such cases, we will first attempt to remedy the issue through corrective work before any refund is discussed.',
                ) ),
                array( 'heading' => 'Maintenance Plans', 'body' => array(
                    'Annual maintenance plans may be cancelled at any time. Refunds for cancelled maintenance plans are prorated based on the unused portion of the plan period, less the cost of any service visits already performed.',
                    'Refunds for maintenance plans are processed within 14 business days of cancellation.',
                ) ),
                array( 'heading' => 'Refund Processing', 'body' => array(
                    'Approved refunds are returned to the original payment method used for the transaction. Processing times may vary depending on your bank or payment provider, typically between 5 and 14 business days from our approval.',
                ) ),
                array( 'heading' => 'How to Request a Cancellation or Refund', 'body' => array(
                    'To cancel a service or request a refund, contact us at hyvoxa@gmail.com with your project details and the reason for your request. We will respond within 3 business days to acknowledge your request and outline next steps.',
                ) ),
                array( 'heading' => 'Dispute Resolution', 'body' => array(
                    'If you disagree with a refund decision, we encourage you to contact us to discuss the matter. We are committed to resolving disputes amicably and in good faith. If a resolution cannot be reached, the dispute will be handled according to the governing law clause in our Terms of Service.',
                ) ),
            ),
        ),
    );
}

/**
 * Return nav menu items for auto-creation.
 */
function hyvoxa_menu_items() {
    return array(
        array( 'title' => 'Home',     'url' => home_url( '/' ) ),
        array( 'title' => 'Services', 'url' => get_post_type_archive_link( 'hyvoxa_service' ) ?: home_url( '/services/' ) ),
        array( 'title' => 'Blog',     'url' => home_url( '/blog/' ) ),
        array( 'title' => 'About',    'url' => home_url( '/about/' ) ),
        array( 'title' => 'Contact',  'url' => home_url( '/contact/' ) ),
    );
}
