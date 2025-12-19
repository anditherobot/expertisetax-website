<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
require __DIR__ . '/ContactService.php';  

$blogPosts = [
    'individual-and-business-tax-prep' => [
        'title' => 'Individual & Business Tax Preparation',
        'summary' => 'How we organize your documents, file accurately, and keep your return moving without surprises.',
        'content' => [
            'Every return starts with a brief intake so we understand your income sources, business structure, and any life changes that impact tax strategy.',
            'We provide a clear document checklist for W-2s, 1099s, K-1s, business expenses, and credits you might qualify for.',
            'Before filing we review deductions and credits together, then e-file and monitor confirmations so you get updates quickly.'
        ],
        'badge' => 'Service Spotlight',
        'type' => 'service',
        'cta_heading' => 'Ready to file with confidence?',
        'cta_text' => 'Share your documents securely and let us prepare both federal and state returns with multilingual support.'
    ],
    'state-and-local-tax-returns' => [
        'title' => 'State & Local Tax Returns',
        'summary' => 'Massachusetts filing can be tricky - we reconcile state rules with your federal return so nothing is missed.',
        'content' => [
            'We check residency, credits, and local obligations to keep your Massachusetts return consistent with your federal filing.',
            'If you moved states, we handle part-year and multi-state filings so you stay compliant everywhere you worked.',
            'We also prepare city-specific forms when needed and explain how state decisions affect your next year\'s planning.'
        ],
        'badge' => 'Service Spotlight',
        'type' => 'service',
        'cta_heading' => 'Need state guidance?',
        'cta_text' => 'We will reconcile your state and local requirements so your filing is accurate and on time.'
    ],
    'efiling-and-direct-deposit' => [
        'title' => 'E-filing & Direct Deposit',
        'summary' => 'We submit returns electronically, confirm IRS acceptance, and set up direct deposit so refunds arrive faster.',
        'content' => [
            'Electronic filing reduces errors and speeds up processing; we verify acknowledgements from both the IRS and Massachusetts.',
            'Direct deposit setup is included so you do not wait on mailed checks, and we confirm routing and account details with you.',
            'If a return is rejected, we correct the issue, resubmit promptly, and keep you updated until it clears.'
        ],
        'badge' => 'Service Spotlight',
        'type' => 'service',
        'cta_heading' => 'Want a smoother filing?',
        'cta_text' => 'Let us handle secure e-filing and direct deposit for you so you can track your refund with confidence.'
    ],
    'amended-tax-returns' => [
        'title' => 'Amended Tax Returns',
        'summary' => 'Filed already and noticed an issue? We prepare amendments to correct mistakes and claim missed benefits.',
        'content' => [
            'We review your prior filing to spot errors, credits you qualified for, or income that was left out.',
            'Our team completes the amended return, e-files when available, and organizes any supporting documents the IRS may request.',
            'We provide clear next steps on payment or refund expectations and track responses so you are never in the dark.'
        ],
        'badge' => 'Service Spotlight',
        'type' => 'service',
        'cta_heading' => 'Need to fix a return?',
        'cta_text' => 'We can amend prior filings and guide you through IRS or state follow-ups.'
    ],
    'back-taxes-and-prior-years' => [
        'title' => 'Back Taxes & Prior Years',
        'summary' => 'If you are catching up on multiple years, we organize each return and minimize penalties where possible.',
        'content' => [
            'We start with a timeline so you know exactly which years must be filed and what each one requires.',
            'Our team retrieves transcripts when possible, reconciles missing information, and prepares returns up to the previous three years.',
            'We also discuss payment options and strategies to reduce penalties or interest based on your situation.'
        ],
        'badge' => 'Service Spotlight',
        'type' => 'service',
        'cta_heading' => 'Behind on filing?',
        'cta_text' => 'We specialize in getting clients caught up quickly and communicating with tax agencies when needed.'
    ],
    'year-round-support-and-consulting' => [
        'title' => 'Year-Round Support & Consulting',
        'summary' => 'Taxes are not just seasonal. We help with planning, estimated payments, and life changes throughout the year.',
        'content' => [
            'Schedule check-ins for quarterly estimated taxes, new jobs, or business changes so you avoid surprise balances due.',
            'We outline record-keeping systems for expenses, mileage, and deductions to simplify next year\'s filing.',
            'When laws shift, we translate what matters for you - whether you are an employee, contractor, or small business owner.'
        ],
        'badge' => 'Service Spotlight',
        'type' => 'service',
        'cta_heading' => 'Want proactive guidance?',
        'cta_text' => 'Lean on us year-round for planning and quick answers when your situation changes.'
    ],
    'happy-holidays' => [
        'title' => 'Happy Holidays from Expertise Tax',
        'summary' => 'A quick thank you to our clients and a reminder that we are ready to help you start strong next tax season.',
        'content' => [
            'Thank you for trusting us with your taxes this year. Your referrals and support mean everything to our small business.',
            'While you enjoy the season, set aside pay stubs, charitable receipts, and any major life updates so filing is easy in the new year.',
            'If you want to schedule a January prep call or get a document checklist, reach out anytime - we are here even after the holidays.'
        ],
        'badge' => 'Holiday Message',
        'type' => 'holiday',
        'cta_heading' => 'Planning ahead?',
        'cta_text' => 'Book a post-holiday call so we can organize your documents and timelines for the coming tax season.'
    ]
];
$resources = [
    [
        'title' => 'Holiday Greeting Video',
        'description' => 'Short video clip for client outreach and reminders.',
        'type' => 'video',
        'category' => 'Video',
        'file' => '/media/holiday-greeting.mp4',
        'poster' => '/videos/poster.png',
        'cta' => 'Play video'
    ]
];
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

$app->get('/resources', function (Request $request, Response $response) use ($blogPosts, $resources) {
    $twig = Twig::fromRequest($request);
    $postsForListing = [];

    foreach ($blogPosts as $slug => $post) {
        $postsForListing[] = array_merge($post, [
            'slug' => $slug,
            'url' => $post['type'] === 'service' ? "/service/{$slug}" : "/resources/{$slug}"
        ]);
    }

    return $twig->render($response, 'blog.twig', [
        'title' => 'Resources | Expertise Tax LLC',
        'meta_description' => 'Downloadable PDFs, images, and short videos plus service spotlights from Expertise Tax.',
        'meta_keywords' => 'tax resources, tax planning pdf, tax video, tax marketing materials, Expertise Tax resources',
        'canonical_url' => 'https://expertisetax.com/resources',
        'og_title' => 'Resources - Expertise Tax LLC',
        'og_description' => 'Downloadable PDFs, images, and short videos plus service spotlights from Expertise Tax.',
        'og_image' => '/images/logo.png',
        'og_type' => 'website',
        'resources' => $resources,
        'posts' => $postsForListing
    ]);
});

$app->get('/blog', function (Request $request, Response $response) {
    return $response
        ->withHeader('Location', '/resources')
        ->withStatus(301);
});

$app->get('/resources/{slug}', function (Request $request, Response $response, array $args) use ($blogPosts) {
    $slug = $args['slug'] ?? '';

    if (!isset($blogPosts[$slug])) {
        $response = $response->withStatus(404);
        $response->getBody()->write('Resource not found.');
        return $response;
    }

    $post = $blogPosts[$slug];

    if ($post['type'] === 'service') {
        return $response
            ->withHeader('Location', '/service/' . $slug)
            ->withStatus(302);
    }

    $twig = Twig::fromRequest($request);

    return $twig->render($response, 'post.twig', [
        'title' => $post['title'] . ' | Expertise Tax Resources',
        'meta_description' => $post['summary'],
        'canonical_url' => 'https://expertisetax.com/resources/' . $slug,
        'og_title' => $post['title'] . ' | Expertise Tax Resources',
        'og_description' => $post['summary'],
        'og_image' => '/images/logo.png',
        'og_type' => 'article',
        'post' => $post
    ]);
});

$app->get('/service/{slug}', function (Request $request, Response $response, array $args) use ($blogPosts) {
    $slug = $args['slug'] ?? '';

    if (!isset($blogPosts[$slug]) || $blogPosts[$slug]['type'] !== 'service') {
        $response = $response->withStatus(404);
        $response->getBody()->write('Service post not found.');
        return $response;
    }

    $post = $blogPosts[$slug];
    $twig = Twig::fromRequest($request);

    return $twig->render($response, 'post.twig', [
        'title' => $post['title'] . ' | Expertise Tax Services',
        'meta_description' => $post['summary'],
        'canonical_url' => 'https://expertisetax.com/service/' . $slug,
        'og_title' => $post['title'] . ' | Expertise Tax Services',
        'og_description' => $post['summary'],
        'og_image' => '/images/logo.png',
        'og_type' => 'article',
        'post' => $post
    ]);
});

$app->get('/blog/{slug}', function (Request $request, Response $response, array $args) use ($blogPosts) {
    $slug = $args['slug'] ?? '';

    if (!isset($blogPosts[$slug])) {
        $response = $response->withStatus(404);
        $response->getBody()->write('Resource not found.');
        return $response;
    }

    return $response
        ->withHeader('Location', '/resources/' . $slug)
        ->withStatus(301);
});
