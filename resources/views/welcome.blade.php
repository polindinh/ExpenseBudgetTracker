<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Budget</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
</head>
<body>
<div class="container">
    <header class="header-main flex ai-center">
        <nav class="nav-main">
            <div class="flex ai-center">
                <div class="logo ta-center ptb-4" ><a href="/" class="brand-text" style="color:blue;">Expense<p class="suffix" style="display:inline;">Tracker</p></a>
                </div>
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
                    <h1 class="heading-primary">Manage your budgets and expenses.</h1>
                    <p class="description">Build better
                        money management habits and create customizable budgets.</p>
                    <a href="/signup" class="button button-primary" style="padding: .75rem 0.75rem;">It's Free ! Sign Up Now</a>
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
                <h2 class="heading-secondary">What We Offer</h2>
            </div>
            <!-- <div class="features-list flex jc-space-between " style="display:grid;grid-template-columns:1fr 1fr 1fr; ">
                <div>
                    <p class="feature is-active flex jc-space-between button button-primary" id="featureBudgets" style="color:whitesmoke;font-weight: 900;padding: .1rem 0.75rem;">Manage Budgets</p>
                    <p class="" id="contentBudgets">Create budgets from any category with any amount of money. They're
                        updated automatically after each expense.</p>
                </div>
                <div>
                    <p class="feature is-active flex jc-space-between button button-primary" id="featureExpenses" style="color:whitesmoke;font-weight: 900;padding: .1rem 0.75rem;">Track Expenses</p>
                    <p id="contentSpending" class="">Add expenses and income at your leisure, into a category that fits
                        it best. Don't see a category that really matches? Make your own!</p>
                </div>
                <div>
                    <p class="feature is-active flex jc-space-between button button-primary" id="featureCharts" style="color:whitesmoke;font-weight: 900;padding: .1rem 0.75rem;">View Charts</p>
                    <p id="contentAnalytics" class="is-active">Every month you can see detailed statistics about your spending,
                        broken down by amount per day, amount per category, and how much of each budget was spent.</p>
                </div>
            </div> -->
        </div>
        <footer class="footer-main">
            <div class="copyright text-center">
                <p class="tagline"><span>©{{date('Y')}} ExpenseTracker</span> - Better Managing Your Finances</p>
            </div>
        </footer>
    </main>
</div>
</body>
</html>
