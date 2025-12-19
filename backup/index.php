<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expertise Tax LLC - Professional Tax Services in Greater Boston, MA</title>
    <meta name="description" content="Expertise Tax LLC provides professional tax services in Greater Boston, Massachusetts. We offer personalized service in multiple languages, including Mandarin, Polish, Russian, Ukrainian, Haitian Creole, and English. Contact registered tax preparer Oksana Shuran for expert tax help.">
    <meta name="keywords" content="tax preparation, tax services, tax help, tax return, tax expert, Boston taxes, Massachusetts taxes, Mandarin tax service, Polish tax service, Russian tax service, Ukrainian tax service, Haitian Creole tax service">
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
            padding: 4rem 0;
            text-align: center;
        }

      .jumbotron-header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

      .jumbotron-header.title-badge {
            font-size: 1.2rem;
            padding: 0.7rem 2rem;
            margin-bottom: 1rem;
            display: block;
            margin: 0 auto 1rem;
        }

      .jumbotron-header.slogan {
            font-size: 1.5rem;
            font-style: italic;
            font-weight: 500;
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

      .language-section.row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
           
        }

      .language-item {
            width: 150px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding:5px;
            text-align: center;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            flex: 0 0 auto;
        }

      .language-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

      .flag {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            display: block;
            margin: 0 auto;
        }

      .language-item.card-title {
            font-size: 1.2rem;
        }

        footer {
            color: white; 
            text-align: center;
            padding: 1.5rem 0;
            background-color: var(--primary-color);
            font-size: 1.1rem;
            line-height: 1.8;
        }

        footer p {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Expertise Tax LLC",
      "image": "https://expertisetax.com/images/oksana-shuran.jpg", 
      "@id": "https://expertisetax.com",
      "url": "https://expertisetax.com",
      "telephone": "617-352-5993",
     
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday"
        ],
        "opens": "09:00",
        "closes": "17:00"
      }
    }
    </script>

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
        <div class="row">
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
                                <span class="flag">'. $language['flag']. '</span>
                                <h5 class="card-title">'. $language['name']. '</h5>
                            </div>
                        </div>
                    </div>';
            }
          ?>
        </div>
    </section>
</main>

<footer class="text-center py-4">
    <p>© <?php echo date('Y');?> Expertise Tax LLC</p>
    <p>Professional Tax Services</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>