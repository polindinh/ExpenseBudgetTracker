<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Budget</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
</head>
<body>
<div class="container">
    <header class="header-main flex ai-center">
        <nav class="nav-main">
            <div class="flex ai-center">
                <div class="logo">{{env('MIX_APP_NAME')}}{{env('MIX_APP_SUFFIX')}}</div>
                <ul>
                    <li><a href="#features" class="animate-link">Features</a></li>
                </ul>
            </div>
        </nav>
        <div class="nav-buttons text-right">
            <div class="flex ai-center jc-flex-end">
                <a href="/login" class="link">Sign In</a>
                <a href="/signup" class="button">Register</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="intro flex">
            <div class="flex flex-1 ai-center">
                <div class="intro-text">
                    <h1 class="heading-primary">Control your spending.</h1>
                    <p class="description">With a manual-only entry mode, create customizable budgets and build better
                        money management habits.</p>
                    <a href="/signup" class="button button-primary">Sign Up For Free</a>
                </div>
            </div>
            <div class="flex-2 text-right">
                <img src="{{asset('imgs/ma_web.svg')}}" width="710"
                     title="Map see on board">
            </div>
        </div>
        <div class="divider">
            <div class="gradient"></div>
        </div>
        <div class="features" id="features">
            <div class="text-center">
                <h2 class="heading-secondary">What can it do?</h2>
            </div>
            <div class="features-list flex jc-space-between">
                <a href="#" class="feature" id="featureBudgets">Manage Budgets</a>
                <a href="#" class="feature" id="featureSpending">Track Spending</a>
                <a href="#" class="feature" id="featureAnalytics">View Analytics</a>
                <a href="#" class="feature is-active" id="featureHabits">Introduce Habits</a>
            </div>
            <div class="flex jc-center">
                <div class="feature-content text-center">
                    <p class="" id="contentBudgets">Create budgets from any category with any amount of money. They're
                        updated automatically after each expense.</p>
                    <p id="contentSpending" class="">Add expenses and income at your leisure, into a category that fits
                        it best. Don't see a category that really matches? Make your own!</p>
                    <p id="contentAnalytics" class="">Every month you can see detailed statistics about your spending,
                        broken down by amount per day, amount per category, and how much of each budget was spent.</p>
                    <p id="contentHabits" class="is-active">By having to create your budgets and enter in every expense
                        manually, you'll build better money-management habits and be more conscious of your
                        spending.</p>
                </div>
            </div>
        </div>
        {{--<div class="pricing-bg">
            <div class="background"></div>
        </div>
        <div class="pricing" id="pricing">
            <div class="text-center">
                <h2 class="heading-secondary is-white">What's it cost?</h2>
            </div>
            <div class="pricing-table flex jc-center">
                <div class="price text-center">
                    <h2 class="heading-price">Free</h2>
                    <p>
                        Unlimited Transactions<br>
                        50 Custom Categories<br>
                        Email Updates
                    </p>
                </div>
                <div class="price text-center">
                    <h2 class="heading-price">Coming Soon</h2>
                    <p>
                        Self-Hosted Installation<br>
                        Multiple Accounts Support<br>
                        And More!
                    </p>
                </div>
            </div>
        </div>
        <div class="access" id="access">
            <div class="text-center">
                <h2 class="heading-secondary">Stay up to date</h2>
            </div>
            <div class="flex jc-center">
                <div class="access-info text-center">
                    <p>Want to know what's coming to the app before anyone else? Subscribe to our newsletter below and
                        you'll recieve exclusive email updates once or twice a month.</p>
                    <form class="form" id="subscribeForm" action="" method="GET">
                        <label for="EMAIL" style="display:none;">Email Address</label>
                        <input type="email" placeholder="email@domain.com" required="" value="" name="EMAIL"
                               id="subscribeEmail">
                        <div style="position:absolute;left:-5000px;" aria-hidden="true">
                            <input type="text" name="b_b04a26f9d197241d64b939b91_67e6daf1ea" tabindex="-1" value="">
                        </div>
                        <a href="#" class="button button-primary" id="subscribeButton">Let's Go</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="divider">
            <div class="gradient"></div>
        </div>--}}
        <footer class="footer-main">
            <div class="copyright text-center">
                <p class="tagline"><span>©{{date('Y')}} {{app()->environment('APP_NAME')}}</span> - Keep track of your
                    finances and build better
                    spending habits</p>
            </div>
        </footer>
    </main>
</div>
</body>
</html>
