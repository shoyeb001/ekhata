<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKhata</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <!-- styles link -->
    <link rel="stylesheet" href="{{asset("frontend/css/styles.css")}}">
</head>

<body>
    <div class="root">
        <nav class="navbar">
            <a href="/">
                <img src="{{asset("frontend/assets/EKhata.png")}}" alt="nav_logo">
            </a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#scroll_service">Services</a></li>
                <li><a href="#scroll_features">Features</a></li>
                <li><a href="#scroll_plans">Plans</a></li>
                <li><a href="{{route("view.login")}}" class="btn_primary">Login</a></li>
            </ul>
        </nav>
        <section class="hero">
            <div class="content">
                <p>Free forever tool for SME Digitization</p>
                <h1>
                    Digitizing normal SMEs into extraordinary businesses
                </h1>
                <p>For Indian SME manufacturers, TranZact is a zero-effort digital transformation tool that digitizes
                    your entire business process right from sales inquiry to dispatch.

                </p>
                <button class="btn_primary">Free Sign Up</button>
            </div>
            <div class="hero_img">
                <img src="{{asset("frontend/assets/hero_img.png")}}" alt="hero_main_img">
            </div>
        </section>
        <section class="company">
            <img src="{{asset("frontend/assets/companies/img_1.png")}}" alt="sponsor1">
            <img src="{{asset("frontend/assets/companies/img_2.png")}}" alt="sponsor2">
            <img src="{{asset("frontend/assets/companies/img_3.png")}}" alt="sponsor3">
            <img src="{{asset("frontend/assets/companies/img_4.png")}}" alt="sponsor4">
            <img src="{{asset("frontend/assets/companies/img_5.png")}}" alt="sponsor4" id="scroll_service">
        </section>
        <section class="services">
            <h1>Simple as Excel & Impactful as SAP</h1>
            <p>Also, Integrated with Tally to Streamline your Accounting</p>
            <div class="service_container">
                <div class="service">
                    <img src="{{asset("frontend/assets/services/services_1.png")}}" alt="service_img_1">
                    <h2>Also, Integrated with Tally to Streamline your Accounting</h2>
                    <p>95% users say that the best thing about TranZact is that it’s extremely easy to understand and
                        use.</p>
                </div>
                <div class="service">
                    <img src="{{asset("frontend/assets/services/services_2.png")}}" alt="service_img_2">
                    <h2>Invest in Business Growth</h2>
                    <p>Business owners are saving atleast 4 hours on a daily basis and are investing time where they
                        should i.e. BD & RnD</p>
                </div>
                <div class="service">
                    <img src="{{asset("frontend/assets/services/services_3.png")}}" alt="service_img_3">
                    <h2>Get maximum ROI</h2>
                    <p>The free-forever model with 24x7 lifetime support ensures return on investement</p>
                </div>
            </div>
        </section>
        <section class="preview">
            <div class="preview_container" id="scroll_features">
                <div class="images">
                    <img src="{{asset("frontend/assets/preview images/img_1.webp")}}" alt="preview_images">
                </div>
                <div class="container">
                    <h1>Your <span> all-in-one </span> dashboard on cloud.</h1>
                    <ul>
                        <li><span>✓</span>Track overall health of your business in real time</li>
                        <li><span>✓</span>Keep an eye on your quotation to order conversion</li>
                        <li><span>✓</span>Get timely payment by automated notifications and reminders</li>
                    </ul>
                </div>
            </div>
            <div class="preview_container column_reverse">
                <div class="container">
                    <h1><span> Track </span> all your Purchase and Sales Transactions</h1>
                    <ul>
                        <li><span>✓</span>Get a timeline view of every activity in sales and purchase transactions</li>
                        <li><span>✓</span>Post comments real-time and tag your team members for better collaboration
                        </li>
                        <li><span>✓</span> Faster documentation and proactive tracking always keeps you ahead of
                            deadlines</li>
                    </ul>
                </div>
                <div class="images">
                    <img src="{{asset("frontend/assets/preview images/img_2.webp")}}" alt="preview_images">
                </div>
            </div>
            <div class="preview_container">
                <div class="images">
                    <img src="{{asset("frontend/assets/preview images/img_3.webp")}}" alt="preview_images">
                </div>
                <div class="container">
                    <h1><span> Complete visibility </span> of your stock movement</h1>
                    <ul>
                        <li><span>✓</span>Quickly glance at available stock while receiving new order</li>
                        <li><span>✓</span>Prevent shortage of critical raw material</li>
                        <li><span>✓</span>Use barcode to achieve end-to-end item tracing</li>
                    </ul>
                </div>
            </div>
            <div class="preview_container column_reverse">
                <div class="container">
                    <h1><span> Easy integration </span> with your Tally and Excel spreadsheets</h1>
                    <ul>
                        <li><span>✓</span>Single-click setup to integrate with your existing Tally</li>
                        <li><span>✓</span>Automated data transfer to reduce accounting errors</li>
                        <li><span>✓</span>Easily connect with google sheets & excel for customized reports</li>
                    </ul>
                </div>
                <div class="images">
                    <img src="{{asset("frontend/assets/preview images/img_4.webp")}}" alt="preview_images">
                </div>
            </div>
        </section>
        <section class="plans">
            <div class="heading">
                <h1>Flexible plans</h1>
                <p>that fit your needs</p>
            </div>
            <div class="plan_container">
                <div class="plan">
                    <div class="plan_header">
                        <h1>Free forever</h1>
                        <p>Start with our forever free plan to take the first steps towards digitizing your business workflows
                        </p>
                    </div>
                    <ul>
                        <li><span>✓</span>Unique Transaction timeline for Sales/Purchase</li>
                        <li><span>✓</span>Smooth Internal & External Communication</li>
                        <li><span>✓</span>Real Time Inventory/Stock Tracking</li>
                        <li><span>✓</span>Visual Dashboard & Detailed Reporting</li>
                        <li><span>✓</span>Dedicated Customer Success Manager</li>
                        <li><span>✓</span>Free yet Powerful with no limit on Users/Usage</li>
                        <li><span>✓</span>Email Integration to have proper control on Accounting</li>
                    </ul>
                </div>
                <div class="plan" id="scroll_plans">
                    <div class="plan_header plan_header_2">
                        <h1>Advance Plan</h1>
                        <p>Switch to premium version to move to advanced business workflows which will help you to work less
                        </p>
                    </div>
                    <ul>
                        <li><span>✓</span>Everything included in Free Forever Plan</li>
                        <li><span>✓</span>Multi-Level Bill of Material with RMC (Raw Material Costing)</li>
                        <li><span>✓</span>Automated Inventory & Material Requirement Planning (MRP)</li>
                        <li><span>✓</span>Makers and Checkers for your Sales & Purchase Documents</li>
                        <li><span>✓</span>Back tracking of Inventory Items with Barcoding</li>
                        <li><span>✓</span>Upgrade at your wish, Once you are actually ready</li>
                        <li><span>✓</span>Custom Reporting with Google Sheet Integration</li>
                    </ul>
                </div>
            </div>
        </section>
        <footer class="footer">
            <p>Made with ❤️ by Sumit</p>
            <img class="images" src="{{asset("frontend/assets/GitHub.png")}}" alt="git">
        </footer>
    </div>
</body>

</html>
