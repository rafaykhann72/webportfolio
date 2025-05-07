
<?php 
$conn = mysqli_connect('localhost','root','','contact_db') or die('Connection failed');

if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die(mysqli_error($conn));

    if(mysqli_num_rows($select_message) > 0){
        $response[] = 'Message already sent!';
    } else {
        mysqli_query($conn, "INSERT INTO `contact_form` (name, email, number, message) VALUES ('$name', '$email', '$number', '$msg')") or die(mysqli_error($conn));
        $response[] = 'Message sent successfully!';
    }
}
?>



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap');

:root{
    --yellow: #ffcc0d;
    --black: #000;
    --white: #fff;
    --light-bg: #eee;
    --border-bold:.5rem solid var(--black);
    --border-light:.2rem solid var(--black);
}

*{
    font-family: 'Rubik', sans-serif;
    margin: 0; padding: 0;
    box-sizing: border-box;
    outline: none; border: none;
    text-decoration: none;
    text-transform: capitalize;
    color:var(--black);
}

*::selection{
    background-color: var(--black);
    color: var(--yellow);
}

*::-webkit-scrollbar{
    height: .5rem;
    width: 1rem;
}

*::-webkit-scrollbar-track{
    background-color: transparent;
}

*::-webkit-scrollbar-thumb{
    background-color: var(--yellow);
}

html{
    font-size: 62.5%;
    /* overflow: hidden; */
    scroll-behavior: smooth;
}

body{
    /* overflow: hidden; */
    transition: .2s linear !important;
}

body.active{
    padding-left: 35rem;
}

section{
    padding: 3rem 2rem;
    margin: 0 auto;
    max-width: 1200px;
    text-align: center;
}

.heading{
    margin-bottom: 3rem;
    text-align: center;
}

.heading span{
    text-transform: uppercase;
    font-size: 6.5rem;
    border-bottom: var(--border-bold);
}

.message{
    position: sticky;
    top:2rem;
    max-width: 1200px;
    margin:0 auto;
    background-color:var(--yellow);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem;
    font-size: 2rem;
}

.message i{
    cursor: pointer;
}

.btn{
    display: inline-block;
    margin-top: 1rem;
    cursor: pointer;
    padding: 2rem 3rem;
    border: var(--border-light);
    font-size: 2rem;
}

.btn:hover{
    background-color: var(--black);
    color: var(--white);
}

.header{
    position: fixed;
    top: 0; left:-35rem;
    height: 100vh;
    background-color: var(--white);
    border-right: var(--border-bold);
    width: 35rem;
    padding: 3rem 2rem;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-flow: column;
    transition: .2s linear !important;
    text-align: center;
}

.header .logo{
    text-transform: uppercase;
    border-bottom: var(--border-bold);
    font-weight: bolder;
    font-size: 4.5rem;
}

.header .navbar {
    width: 100%;

}

.header .navbar a{
    display: block;
    font-size: 2.5rem;
    padding: 1.5rem;
    margin: .5rem;
}

.header .navbar a.active,
.header .navbar a:hover{
    background-color: var(--yellow);
}

.header .follow a{
    font-size: 3rem;
    margin: 0 1rem;
    cursor: pointer;
    transition: .6s linear !important;
}

.header .follow a:hover{
    transform: rotate(360deg);
}

#menu-btn{
    position: absolute;
    top: 0; right:-5.5rem;
    height: 4.5rem;
    line-height: 4.5rem;
    width: 5rem;
    font-size: 2.5rem;
    cursor: pointer;
    background-color: var(--black);
    color: var(--white);
}

.header.active{
    left: 0;
}

.home{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
    min-height: 100vh;
}

.home .image{
    flex:1 1 40rem;
}

.home .image img{
    height: 55rem;
    padding: 2rem;
    border: var(--border-bold);
}

.home .content{
    flex: 1 1 40rem;
}

.home .content h3{
    text-transform: uppercase;
    font-size: 5rem;
    margin-bottom: .5rem;
}
.home .content span{
    display: inline-block;
    padding: 1rem 2rem;
    background-color: var(--yellow);
    font-size: 2.5rem;
    margin: 1rem 0;
}

.home .content p{
    font-size: 1.7rem;
    line-height: 2;
    padding: 1rem 0;
}

.about .biography p{
    margin: 2rem auto;
    max-width: 70rem;
    line-height: 2;
    font-size: 1.7rem;
}

.about .biography .bio{
    margin-top: 1rem 0;
}

.about .biography .bio h3{
    padding: 1rem 2rem;
    display: inline-block;
    margin: 1rem;
    background-color: var(--light-bg);
    border: var(--border-light);
    word-break: break-all;
    font-size: 2.5rem;
    font-weight: normal;
    text-transform: none;
}

.about .biography .bio h3 span{
    font-weight: lighter;
}

.about .skills{
    margin: 3rem 0;
}

.about .skills .progress{
    margin-top: 1rem;

}

.about .skills .progress .bar{
    margin: 1rem auto;
    max-width: 70rem;
    border: var(--border-bold);
    padding: 1rem;
}

.about .skills .progress .bar h3{
    display: flex;
    align-items: center;
    font-size: 2rem;
    padding: 2rem;
    justify-content: space-between;
    background-color: var(--yellow);
}

.about .skills .progress .bar span{
    font-weight: normal;
}

.about .skills .progress .bar:nth-child(1) h3{
    width: 95%;
}

.about .skills .progress .bar:nth-child(2) h3{
    width: 80%;
}

.about .skills .progress .bar:nth-child(3) h3{
    width: 65%;
}

.about .skills .progress .bar:nth-child(4) h3{
    width: 75%;
}

.about .edu-exp .row{
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.about .edu-exp .row .box-container{
    flex: 1 1 40rem;
}

.about .edu-exp .row .box-container .title{
    padding: 1.5rem;
    font-size: 2.5rem;
    background-color: var(--yellow);
}

.about .edu-exp .row .box-container .box{
    text-align: left;
    margin: 1.5rem 0;
    background-color: var(--light-bg);
    padding: 2rem;
}

.about .edu-exp .row .box-container .box span{
    font-size: 1.5rem;
}

.about .edu-exp .row .box-container .box h3{
    font-size: 2.5rem;
    font-weight: normal;
    margin-top: 1.5rem;
    margin-bottom: 1rem;
}

.about .edu-exp .row .box-container .box p{
    line-height: 1.5;
    font-size: 1.7rem;
    line-height: 2;
}

.services .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:1.5rem;
    align-items: flex-start;

}

.services .box-container .box{
    padding:3rem 2rem;
    border:var(--border-light);
}

.services .box-container .box i{
    font-size: 4rem;
    margin-bottom: 2rem;
}

.services .box-container .box h3{
    margin: 1rem 0;
    font-size:2rem;
    padding: 1.5rem;
    background-color: var(--yellow);
    font-weight:normal;
}

.services .box-container .box p{
    line-height: 2;
    font-size: 1.7rem;
}

.services .box-container .box:hover{
    background-color: var(--black);
}

.services .box-container .box:hover i{
    color:var(--white);
}

.services .box-container .box:hover p{
    color:var(--white);
}

.contact form{
    max-width: 70rem;
    margin:0 auto;
}

.contact form .box{
    width: 100%;
    padding: 1.4rem;
    font-size: 2rem;
    text-transform: none;
    border:var(--border-light);
    margin:1rem 0;
}

.contact form textarea{
    height: 20rem;
    resize:none;
}

.contact form .flex{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.contact form .flex .box{
    width: 49%;
}

.contact .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:1.5rem;
    align-items:flex-start;
    margin-top: 3rem;
}

.contact .box-container .box{
    padding:3rem, 2rem;
    border:var(--border-light);
    background-color:var(--light-bg);

}

.contact .box-container .box i{
    font-size: 3rem;
    height: 7rem;
    width: 7rem;
    line-height: 7rem;
    color:var(--white);
    background-color:var(--black);
    margin-bottom: .5rem;
}

.contact .box-container .box h3{
    margin: 1.5rem, 0;
    font-size: 2.5rem;
}

.contact .box-container .box p{
    font-size: 2rem;
    text-transform: none;
}

.credit{
    text-align: center;
    background-color: var(--black);
    padding: 3rem;
    font-size: 2rem;
    color:var(--white);
}

.credit span{
    color:var(--yellow);
}














@media (max-width:991px){
    html{
        font-size: 55%;
    }
    
    body.active{
        padding-left: 0;
    }
}

@media (max-width:450px){
    html{
        font-size: 50%;
    }

    .header.active{
        padding-top: 7rem;
    }

    #menu-btn.fa-times{
        right: 0;
    }

    .home .image img{
        height: auto;
        width: 100%;
    }

    .heading span{
        font-size: 4rem;
    }

    .about .biography .bio h3{
        font-size: 2rem;
    }

    .contact form .flex .box{
    width: 100%;
    }

}


    </style>

</head>
<body>
 
<?php
if(isset($response)){
    foreach($response as $msg){
        echo '<div class="message"><span>'.$msg.'</span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>';
    }
}
?>
    <header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>
    <a href="#home" class="logo">Portfolio</a>
    <nav class="navbar">
        <a href="#home" class="active">home</a>
        <a href="#about">about</a>
        <a href="#services">services</a>
        <a href="#contact">contact</a>
    </nav>

    <div class="follow">
        <a href="https://www.facebook.com/share/19xSBEYboQ/" class="fab fa-facebook-f"></a>
        <a href="https://l.instagram.com/?u=https%3A%2F%2Fx.com%2Fpoppyolivia35%3Ffbclid%3DPAQ0xDSwKHEs1leHRuA2FlbQIxMQABp8wFxWdXuqGmu0WmUmmQoj80D_nB7l5A5Cj-PHDxxrqYjQeFeEIg3megvKhl_aem_FJ2ssoK0yvU3VvRMTWN9mg&e=AT0F4ltiSpdnQzm0qrIUufGdzRRQ1AxiatuvXZ3M_rF27DUdOM_Iup30dI1gdztRMhanRc6S6oDpSayOxQWb3PkACjSy_HQ5QwOj95I" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com/rafaykhan.72?igsh=MWF0aThhYXQ1ZnY1bQ==" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com/in/lala-rafay-2446ab331?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="fab fa-linkedin"></a>
    </div>
    </header>

    <section class="home" id="home">
        <div class="image">
            <img src="images/user-img.jpg.jpeg" alt="">
        </div>
        <div class="content">
            <h3>Hi, i am Rafay Khan</h3>
            <span>Full Stack Developer</span>
            <p>My name is Rafay, and I am a passionate Full Stack Web Developer with expertise in UI/UX design, front-end development, and back-end programming. I enjoy creating responsive, user-friendly websites and web applications that deliver real value. With a strong foundation in both design and development, I strive to build seamless digital experiences from start to finish.</p>
            <a href="#about" class="btn">about menu</a>
        </div>
    </section>

    <section class="about" id="about">
        <h1 class="heading"><span>biography </span></h1>
        <div class="biography">
            <p>My name is Rafay Khan, a 20-year-old passionate Full Stack Web Developer based in Latifabad, Hyderabad. With over 2 years of hands-on experience in web development, I specialize in crafting complete digital solutions—from intuitive UI/UX design to responsive front-end interfaces and robust back-end systems. My work focuses on delivering high-performance, user-centric applications tailored to meet real-world needs. I'm always eager to learn new technologies and take on challenging projects.</p>
            <div class="bio">
                <h3><span>name :</span>Rafay Khan</h3>
                <h3><span>age :</span>20 years</h3>
                <h3><span>experience :</span>2+ years </h3>
                <h3><span>email :</span>rafaypathan54@gmail.com</h3>
                <h3><span>phone :</span>=92-319-2843589</h3>
                <h3><span>address :</span>Latifabad, Hyderabad</h3>
            </div>
            <a href="#" class="btn">download CV</a>
        </div>
        <div class="skills">
            <h1 class="heading"><span>skills</span></h1>
            <div class="progress">
                <div class="bar"><h3> <span>HTML</span>       <span>95%</span>        </h3></div>
                <div class="bar"><h3> <span>CSS</span>        <span>80%</span>        </h3></div>
                <div class="bar"><h3> <span>JAVASCRIPT</span> <span>65%</span>        </h3></div>
                <div class="bar"><h3> <span>PHP</span>        <span>75%</span>        </h3></div>
            </div>
        </div>
        <div class="edu-exp">
            <h1 class="heading"><span>education & experience</span></h1>

            <div class="row">

            <div class="box-container">

            <h3 class="title">education</h3>

            <div class="box">
                <span>(2022 - 2023)</span>
                <h3>HSC</h3>
                <p>I completed my Intermediate in Computer Science from 2022 to 2023, where I gained a strong foundation in programming and IT concepts. This education sparked my passion for web development and helped me build essential skills for my professional journey.</p>
            </div>

            
            <div class="box">
                <span>(2020 - 2021)</span>
                <h3>SSC</h3>
                <p>I completed my Matriculation in Computer Science from 2020 to 2021, where I developed a basic understanding of computers, programming, and IT concepts. This early exposure laid the groundwork for my future interest in software and web development.</p>
            </div>

            
            <div class="box">
                <span>(2022 - 2023)</span>
                <h3>Full Stack Development</h3>
                <p>I completed a Full Stack Web Development course from Aptech in 2022–2023. During this time, I gained practical skills in front-end and back-end technologies, which enabled me to build dynamic, responsive, and user-friendly web applications from scratch.</p>
            </div>
            </div>

            
            <div class="box-container">

            <h3 class="title">experience</h3>

            <div class="box">
                <span>(2023 - 2024)</span>
                <h3>Sales Executive</h3>
                <p>From 2023 to 2024, I worked as a Sales Executive at M-Tech Company. During this role, I developed strong communication and customer handling skills, improved my sales strategies, and gained valuable experience in dealing with clients and product promotion.</p>
            </div>

            
            <div class="box">
                <span>(2022 - 2023)</span>
                <h3>CCTV Installer</h3>
                <p>From 2022 to 2023, I worked as a CCTV Installer at Mayor Equipment Company. This role enhanced my technical skills in surveillance systems, including installation, configuration, and maintenance of CCTV cameras, ensuring security solutions were effectively implemented for clients.</p>
            </div>

            
            <div class="box">
                <span>(2019 - 2022)</span>
                <h3>12 Volt Water, fan Motor Repairment</h3>
                <p>From 2019 to 2022, I worked at Majeed Autos Shop, where I specialized in repairing 12-volt water motors and fan motors. This hands-on experience improved my technical abilities and deepened my understanding of electrical motor maintenance </p>
            </div>
            </div>

            </div>
        </div>
    </section>

    <section class="services" id="services">
        <h1 class="heading"><span>services</span></h1>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-code"></i>
                <h3>web development</h3>
               <p>I provide professional web development services, including responsive design, front-end, and back-end solutions. </p>
            </div>

            <div class="box">
                <i class="fas fa-paint-brush"></i>
                <h3>UI / UX designer</h3>
               <p> I offer expert UI/UX design services, creating intuitive, user-friendly interfaces for seamless digital </p>
            </div>

            <div class="box">
                <i class="fab fa-bootstrap"></i>
                <h3>bootsrap</h3>
               <p> I offer Bootstrap services, building responsive, mobile-first websites with fast and scalable front-end designs.</p>
            </div>

            <div class="box">
                <i class="fas fa-chart-line"></i>
                <h3>seo marketing</h3>
               <p> I offer SEO marketing services, optimizing websites to improve search engine rankings and drive organic traffic.</p>
            </div>

            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>digital marketing</h3>
               <p> I provide digital marketing services, including SEO, social media management, and content strategies to boost growth.</p>
            </div>

            <div class="box">
                <i class="fab fa-wordpress"></i>
                <h3>wordpress</h3>
               <p>I provide expert WordPress services, including custom themes, plugins, and website development for enhanced  </p>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h1 class="heading"><span>contact me</span></h1>
        <form action="" method="post">
            <div class="flex">
                <input type="text" name="name" placeholder="enter your name" class="box" required>
                <input type="email" name="email" placeholder="enter your email" class="box" required>
            </div>
            <input type="number" min="0" name="number" placeholder="enter your number" class="box" required>
            <textarea name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" name="send" class="btn">
        </form>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone</h3>
                <p>+92-319-2843589</p>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email</h3>
                <p>rafaypathan54@gmail.com</p>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>address</h3>
                <p>latifabad, hyderabad</p>
            </div>
        </div>
    </section>

    <div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> By <span>mr. web designer</span></div>






















<script>
    let menu = document.querySelector('#menu-btn');
let header = document.querySelector('.header');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    header.classList.toggle('active');
    document.body.classList.toggle('active');
}

window.onscroll = () =>{
    if(window.innerWidth < 991){
        menu.classList.remove('fa-times');
        header.classList.remove('active');
        document.body.classList.remove('active');
    }

    document.querySelectorAll('section').foreach(sec =>{
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            document.querySelectorAll('.header .navbar a').forEach(link =>{
                link.classlist.remove('active');
                document.querySelector('.header .navbar a[href*='+ id +']').classlist.add
                ('active')
            });
        };
    });
}

</script>
</body>
</html>