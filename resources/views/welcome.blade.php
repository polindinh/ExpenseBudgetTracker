<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Expense Tracker</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link type="text/css" href="{{ asset('css/home.css') }}" rel="stylesheet">

</head>
<body>
<div class="container">
    <header class="header-main flex ai-center">
        <nav class="nav-main">
            <div class="flex ai-center">
                <div class="logo ta-center ptb-4" style="background:transparent;"><a href="/" class="brand-text">Expense<p class="suffix" style="display:inline;">Tracker</p></a>
                </div>
            </div>
        </nav>
        <div class="nav-buttons text-right">
            <div class="flex ai-center jc-flex-end">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="/home" class="button button-primary" style="display:inline-block;">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="button button-primary" style="display:inline-block;">Login</a>
                        @if (Route::has('register'))
                            <a href="/signup" class="button button-primary" style="display:inline-block;">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </header>
    <main class="main">
        <div class="intro flex">
            <div class="flex flex-1 ai-center">
                <div class="intro-text">
                    <h1 class="heading-primary">Manage your budgets and expenses.</h1>
                    <p class="description">
                        Are you trying to pay down debt? Save up money? Whatever your goal is, a spending tracker helps keep you honest and aligned with your bigger financial goals. Build better
                        money management habits and create customizable budgets with Expense Tracker</p>
                        <a href="/signup" class="button button-primary">It's Free ! Sign Up Now</a>
                </div>
            </div>
            <div class="flex-2 text-right">
                <img src="{{asset('imgs/budget.jpg')}}" width="710"
                     title="Map see on board">
            </div>
        </div>
        <div class="divider">
            <div class="gradient"></div>
        </div>
        <div class="features" id="features">
            <div class="text-center mt-4">
                <h2 class="heading-primary header-point">What We Offer</h2>
            </div>
            <div class="featurePoints">
                <div class="point-one" >
                    <div class="text-center"> 
                        <img class="point picture-one" src="{{asset('imgs/ma_web.svg')}}" alt="Image">                  
                        <p class="button button-primary" id="">Budgets Managing</p>
                    </div>
                    <div>
                        <h3 class="heading-primary">Create budgets from any category with any amount of money. They're
                        updated automatically.</h3>
                        <p id="contentBudgets" class="is-active description"> It’s easy to plan for your mortgage, rent,
                         or car payments because these amounts generally stay the same. But what about dining out, going out,
                          groceries, gas, and shopping? These expenses tend to fluctuate, so you can’t just plug
                           in a number off the top of your head. Maybe you went out more than usual one week, or bought more groceries because you
                            had guests over. To get a firm grasp on your average spending in any category, you need to track it for at least a few weeks to get an average.
                              Once you have that, the budget you eventually create will be much more useful and accurate.</p>
                    </div>
                    <div class="text-center hidden-mobile"> 
                        <img class="point" src="{{asset('imgs/ma_web.svg')}}" alt="Image">                  
                        <p class="button button-primary" id="">Budgets Managing</p>
                    </div>
                </div>

                <div class="point-two">
                    <div class="text-center show">
                        <img class="point" src="{{asset('imgs/tracking.jpg')}}" alt="Image">                  
                        <p class="button button-primary" id="">Expenses Tracking</p>
                    </div>
                    <div>
                    <h3 class="heading-primary">Add expenses and income at your leisure, into a category that fits
                        it best.</h3>

                    <p id="contentSpending" class="description"> Don't see a category that really matches? Make your own! By tracking your expenses,  you might discover
                         that you’re actually spending $140 a month on lunch every day at work. Bringing this number to light might just be
                          the motivation you need to start packing a lunch and putting that money towards your debt. It’s also important to 
                          remember that your financial goals may change over time, and that’s okay. So let’s say you meet your goal and pay off that credit card.</p>
                    </div>
                    <div class="text-center hidden-mobile show-big">
                        <img class="point" src="{{asset('imgs/tracking.jpg')}}" alt="Image">                  
                        <p class="button button-primary" id="">Expenses Tracking</p>
                    </div>
                </div>
                <div class="point-three">
                    <div class="text-center">
                        <img class="point" src="{{asset('imgs/Analytics.jpg')}}" alt="Image">
                        <p class="button button-primary" id="">Detail Analytics</p>
                    </div>
                    <div>
                    <h3 class="heading-primary">If you’ve ever wondered where your money goes, our free monthly 
                            spending tracker is just the tool for you!</h3>
                        <p id="contentAnalytics" class="is-active description"> Every month you 
                            can see detailed statistics about your spending,
                             down by amount per day, amount per category, and how much of each budget was spent, eventually compiling them into 
                             monthly totals for each expense. And once you’re comfortable tracking, you 
                            can enter a budget for each expense item. The tracker will then automatically let you know if you’re coming in over 
                            or under budget. This personal expense tracker can really pay off, so download it today. It’s free!</p>
                    </div>
                    <div class="text-center hidden-mobile">
                        <img src="{{asset('imgs/Analytics.jpg')}}" alt="Image">
                        <p class="button button-primary" id="">Detail Analytics</p>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
        <!-- <div class="dividerone">
            <div class="gradient"></div>
        </div> -->
        <footer class="footer-main">
            <div class="copyright text-center">
                <p class="tagline"><span>©{{date('Y')}} ExpenseTracker</span> - Better Finances</p>
            </div>
        </footer>
    </main>
</div>
</body>
</html>
