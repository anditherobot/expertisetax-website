<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
require __DIR__ . '/ContactService.php';  
$app->get('/', function (Request $request, Response $response, $args) {
    $twig = Twig::fromRequest($request);
    return $twig->render($response, 'home.twig', [
        'title' => 'Professional Tax Services in Greater Boston, MA | Expertise Tax LLC',
        'meta_description' => 'Expert tax preparation and filing services in Greater Boston. Multilingual support in English, Polish, Russian, Ukrainian, Haitian Creole, and Mandarin. Call Registered Tax Preparer Oksana Shuran at 617-352-5993.',
        'meta_keywords' => 'tax preparation Boston, tax services Massachusetts, multilingual tax help, Polish tax service, Russian tax service, Ukrainian tax service, Haitian Creole tax service, Mandarin tax service, Oksana Shuran, registered tax preparer',
        'canonical_url' => 'https://expertisetax.com/',
        'og_title' => 'Expertise Tax LLC - Professional Tax Services in Greater Boston',
        'og_description' => 'Expert tax preparation with personalized service in 6 languages. File your taxes with confidence. Call 617-352-5993 today.',
        'og_image' => '/images/logo.png',
        'og_type' => 'website',
    ]);
});

$app->get('/services', function (Request $request, Response $response, $args) {
    $twig = Twig::fromRequest($request);
    return $twig->render($response, 'services.twig', [
        'title' => 'Tax Preparation Services | Individual & Business | Expertise Tax LLC',
        'meta_description' => 'Comprehensive tax preparation services including Form 1040, state returns, e-filing, amended returns, and back taxes. Year-round support from registered tax professionals in Greater Boston, MA.',
        'meta_keywords' => 'tax preparation services, Form 1040, state tax returns, e-filing, amended tax returns, back taxes, tax consultation, Boston tax services',
        'canonical_url' => 'https://expertisetax.com/services',
        'og_title' => 'Tax Preparation Services - Expertise Tax LLC',
        'og_description' => 'Individual & business tax preparation, e-filing, amended returns, and year-round support. Expert service in Greater Boston.',
        'og_image' => '/images/logo.png',
        'og_type' => 'website',
    ]);
});

$app->get('/about', function (Request $request, Response $response, $args) {
    $twig = Twig::fromRequest($request);
    return $twig->render($response, 'about.twig', [
        'title' => 'About Oksana Shuran & Expertise Tax LLC | Our Story & Mission',
        'meta_description' => 'Learn about Expertise Tax LLC and Registered Tax Return Preparer Oksana Shuran. We provide personalized, multilingual tax services with expertise and commitment to accuracy in Greater Boston, MA.',
        'meta_keywords' => 'Oksana Shuran, registered tax preparer, about Expertise Tax, tax professional Boston, multilingual tax expert, tax preparation experience',
        'canonical_url' => 'https://expertisetax.com/about',
        'og_title' => 'About Expertise Tax LLC & Oksana Shuran',
        'og_description' => 'Meet Oksana Shuran, Registered Tax Return Preparer dedicated to making tax preparation accessible and stress-free for clients in Greater Boston.',
        'og_image' => '/images/logo.png',
        'og_type' => 'website',
    ]);
});

$app->get('/contact', function (Request $request, Response $response, $args) {
    $twig = Twig::fromRequest($request);
    return $twig->render($response, 'contact.twig', [
        'title' => 'Contact Us | Expertise Tax LLC | 617-352-5993',
        'meta_description' => 'Contact Expertise Tax LLC for professional tax services. Call 617-352-5993, email oksana@expertisetax.com, or visit us in Greater Boston, MA. Multilingual support available.',
        'meta_keywords' => 'contact tax preparer, tax service contact, Expertise Tax contact, Boston tax help, 617-352-5993, oksana@expertisetax.com',
        'canonical_url' => 'https://expertisetax.com/contact',
        'og_title' => 'Contact Expertise Tax LLC',
        'og_description' => 'Get in touch for expert tax preparation services. Call 617-352-5993 or email oksana@expertisetax.com. Multilingual support available.',
        'og_image' => '/images/logo.png',
        'og_type' => 'website',
    ]);
});

$app->post('/contact', function (Request $request, Response $response, $args) {
    $twig = Twig::fromRequest($request);
    $data = $request->getParsedBody();
    $contactService = new ContactService();

    // Define meta data once to avoid repetition
    $metaData = [
        'title' => 'Contact Us | Expertise Tax LLC | 617-352-5993',
        'meta_description' => 'Contact Expertise Tax LLC for professional tax services. Call 617-352-5993, email oksana@expertisetax.com, or visit us in Greater Boston, MA. Multilingual support available.',
        'meta_keywords' => 'contact tax preparer, tax service contact, Expertise Tax contact, Boston tax help, 617-352-5993, oksana@expertisetax.com',
        'canonical_url' => 'https://expertisetax.com/contact',
        'og_title' => 'Contact Expertise Tax LLC',
        'og_description' => 'Get in touch for expert tax preparation services. Call 617-352-5993 or email oksana@expertisetax.com. Multilingual support available.',
        'og_image' => '/images/logo.png',
        'og_type' => 'website',
    ];

    try {
        $contactService->saveContact($data);
        return $twig->render($response, 'contact.twig', array_merge($metaData, [
            'success' => 'We will contact you soon'
        ]));
    } catch (Exception $e) {
        return $twig->render($response, 'contact.twig', array_merge($metaData, [
            'error' => $e->getMessage()
        ]))->withStatus(400);
    }
});