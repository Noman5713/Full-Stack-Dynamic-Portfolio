@extends('index')
@section('main-content')

<div id="about" class="section">
    <h1 class="section-title">About Me</h1>
    <div class="about-content">
        <img src="{{ asset('assets/images/noman.jpg') }}" alt="Profile" class="about-image">
        <div class="about-text">
            <p>Hi there! I'm Abdullah Al Noman and I'm a Computer Science graduate with a strong academic background and research experience, particularly in artificial intelligence and machine learning.</p>
        </div>
    </div>
</div>

<div id="education" class="section">
    <h2 class="section-title">Education</h2>
    <div class="education-item">
        <h3>Bachelor of Science in Computer Science & Engineering</h3>
        <p>Daffodil International University (January 2022- )</p>
        <p>CGPA: <strong>3.93/4.00</strong></p>
    </div>
</div>

<div id="research" class="section">
    <h2 class="section-title">Research</h2>
    <ul class="content-list">
        <li><strong>Predicting Heat Stroke Risk: A Clinical Decision Support System using Fuzzy Association Mining Approach</strong></li>
        <li><strong>Predicting Customer Sentiment from Bangladeshi E-Commerce using Machine Learning Techniques</section></li>
        <li>Bangladesh Road Traffic Sign Detection And Navigation Using Deep Learning</li>
    </ul>
</div>

<div id="publications" class="section">
    <h2 class="section-title">Publications/Press</h2>
    <ul class="content-list">
        <li>Predicting Heat Stroke Risk: A Clinical Decision Support System using Fuzzy Association Mining Approach<span class="meta">Array, 2024 [Q1]</span></li>
        <li>Predicting Customer Sentiment from Bangladeshi E-Commerce using Machine Learning Techniques<span class="meta">Digital Health, 2024 [Q2]</span></li>
        <li>Bangladesh Road Traffic Sign Detection And Navigation Using Deep Learning<span class="meta">Springer, 2023</span></li>
    </ul>
</div>

<div id="projects" class="section">
    <h2 class="section-title">Projects</h2>
    <ul class="content-list">
        <li>ReSearchPro (Flutter Based Project)</li>
        <li>eorigjoi3tjoi24it</li>
        <li>oegno5o5oeti4oi4oihot</li>
        <li>iuqu3gthoWRGJP4ITJPEIJ42PITJPI</li>
    </ul>
</div>

<div id="experience" class="section">
    <h2 class="section-title">Experience</h2>
    <ul class="content-list">
        <li>Research Assistant, Health Informatics Research Lab </li>
        <li>Lab Assistant, 4IR Research cell, DIU</li>
        <li>Trainer, Advanced Machine Learning and Deep Learning BootCamp</li>
        <li>Trainer, ITEE Batch April 2024</li>
        <li>Lab Prefect, Problem Solving Lab at DIU</li>
    </ul>
</div>

<div id="news" class="section">
    <h2 class="section-title">News</h2>
    <ul class="content-list">
        <li>May 2025: Published 3 research paper in  IEEE explore</li>
        <li>January 2024: Joined as RA at Health Informatics Research Lab</li>
        <li>April 2024: Joined as General Secretary of DIU CPC</li>
        <li>Dec 2023: Published first review article x 2</li>
        <li>Dec 2023: Published first review article x 2</li>
        <li>Dec 2023: Published first review article x 2</li>
        <li>Dec 2023: Published first review article x 2</li>
        <li>Dec 2023: Published first review article x 2</li>
        <li>Dec 2023: Published first review article x 2</li>
        <li>Dec 2023: Published first review article x 2</li>
        <li>Dec 2023: Published first review article x 2</li>
    </ul>
</div>

<div id="extra" class="section">
    <h2 class="section-title">Extra Curricular Activities</h2>
    <ul class="content-list">
        <li>General Secretary, DIU Computer and Programming Club (April 2024)</li>
        <li>Executive member of Volunteery Service Club</li>
        <li>Founding Executive member of Songho Sahajjer Ek Ongikar</li>
        <li>Government scholarship in JSC and High School Entrance</li>
    </ul>
</div>

<div id="services" class="section">
    <h2 class="section-title">Services</h2>
    <ul class="content-list">
        <li>Peer Reviewer for Engineering Applications of Artificial Intelligence</li>
        <li>Peer Reviewer for Computational Biology and Chemistry</li>
        <li>Peer Reviewer for Systems and Soft Computing</li>
    </ul>
</div>

<div id="contact" class="section">
    <h2 class="section-title">Contact Me</h2>
    



    <div>
        <div>
           
        </div>
        <div>
             <form id="contactForm" autocomplete="off" style="background:#fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07);">
        <div style="margin-bottom: 15px;">
            <input type="text" id="name" name="name" placeholder="Name *" required style="width:100%;padding:10px;border-radius:5px;border:1px solid #333;background:#fff;color:#222;">
        </div>
        <div style="margin-bottom: 15px;">
            <input type="email" id="email" name="email" placeholder="Email *" required style="width:100%;padding:10px;border-radius:5px;border:1px solid #333;background:#fff;color:#222;">
        </div>
        <div style="margin-bottom: 15px;">
            <input type="text" id="subject" name="subject" placeholder="Your Subject *" required style="width:100%;padding:10px;border-radius:5px;border:1px solid #333;background:#fff;color:#222;">
        </div>
        <div style="margin-bottom: 15px;">
            <textarea id="message" name="message" placeholder="Your Message *" required rows="5" style="width:100%;padding:10px;border-radius:5px;border:1px solid #333;background:#fff;color:#222;"></textarea>
        </div>
        <button type="submit" style="width:100%;padding:12px 0;border:none;border-radius:5px;background:#222;color:#fff;font-size:1.1em;cursor:pointer;">Send Message</button>
        <div id="formStatus" style="margin-top:10px;"></div>
    </form>
        </div>
    </div>
</div>
<script src="{{ asset('JS/script.js') }}"></script>

@endsection