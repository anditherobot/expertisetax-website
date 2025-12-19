<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expertise Tax LLC - Professional Tax Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
            --primary-color: #006A4E;
            --accent-color: #F5A623;
            --text-light: #FFFFFF;
            --text-dark: #000000;
            --bg-light: #F5F7FA;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container {
            max-width: 680px;
        }

        .jumbotron-header {
            background-color: var(--primary-color);
            color: white;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, 1px 1px 0 #000, 1px 1px 0 #000;
            padding: 3rem 0;
        }

        .jumbotron-header h1 {
            font-weight: bold;
        }

        .jumbotron-header .slogan {
            font-style: italic;
        }

        .title-badge {
            display: inline-block;
            background-color: var(--accent-color);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
        }

        .slogan {
            font-style: italic;
        }

        .link-card {
            display: block;
            background: #FFFFFF;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            transition: all 0.2s ease;
        }

        .link-card:hover,
        .link-card:focus {
            background: var(--accent-color);
            color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .language-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .language-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .flag {
            font-size: 2em;
            margin-right: 0.5em;
            display: inline-block;
            line-height: 1;
        }

        .language-item .card-title {
            font-size: 1.25rem;
            margin-top: 0.5rem;
        }

        footer {
            color: var(--primary-color);
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>
<body>

<header class="profile-section py-4 text-center jumbotron-header">
    <h1>Oksana Shuran</h1>
    <span class="title-badge">Registered Tax Return Preparer</span>
    <p class="slogan">You don't have to be a tax expert. That's our job!</p>
</header>

<main class="container">
    <a href="tel:617-352-5993" class="link-card">
        <h2>📱 Call Us: 617-352-5993</h2>
        <p>Tap to call now</p>
    </a>

    <a href="mailto:oksana@expertisetax.com" class="link-card">
        <h2>📧 Email Us</h2>
        <p>oksana@expertisetax.com</p>
    </a>

    <section class="language-section py-4">
        <h2 class="h4 text-center mb-4">Get personalized tax service in:</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
            <?php
            $languages = [
                ['flag' => '🇨🇳', 'name' => 'Mandarin'],
                ['flag' => '🇵🇱', 'name' => 'Polish'],
                ['flag' => '🇷🇺', 'name' => 'Russian'],
                ['flag' => '🇺🇦', 'name' => 'Ukrainian'],
                ['flag' => '🇭🇹', 'name' => 'Haitian Creole'],
                ['flag' => '🇺🇸', 'name' => 'English'],
            ];

            foreach ($languages as $language) {
                echo '<div class="col">
                        <div class="card language-item text-center">
                            <div class="card-body">
                                <span class="flag">' . $language['flag'] . '</span>
                                <h3 class="card-title">' . $language['name'] . '</h3>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </section>
</main>

<footer class="text-center py-4">
    <p>© <?php echo date('Y'); ?> Expertise Tax LLC</p>
    <p>Professional Tax Services</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>