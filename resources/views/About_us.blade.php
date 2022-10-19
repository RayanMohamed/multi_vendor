<!DOCTYPE html>
<html>
<head>
    <title>PCs & Parts</title>
    <style>
body {
  
  background-repeat: no-repeat;
  background-size: cover;
  
}

* {
 margin: 0;
 padding: 0;
 box-sizing: border-box;
}
a {
 text-decoration: none;
}
li {
 list-style: none;
}
.navbar {
font-family: cursive;
 display: flex;
 align-items: center;
 justify-content: space-between;
 padding: 20px;
 background-color: #32cd32;
 color: #fff;
}
.nav-links a {
 color: #fff;
}
/* LOGO */
.logo {
 font-size: 32px;
}
/* NAVBAR MENU */
.menu {
 display: flex;
 gap: 1em;
 font-size: 18px;
}
.menu li:hover {
 background-color: green;
 border-radius: 5px;
 transition: 0.3s ease;
}
.menu li {
 padding: 5px 14px;
}
/* DROPDOWN MENU */
.services {
 position: relative; 
 font-size: 18px;

}
.dropdown {
 background-color: #32cd32;   
 padding: 1em 0;
 position: absolute; /*WITH RESPECT TO PARENT*/
 display: none;
 border-radius: 8px;
 top: 35px;
}
.dropdown li + li {
 margin-top: 10px;
}
.dropdown li {
 padding: 0.5em 1em;
 width: 8em;
 text-align: center;
}
.dropdown li:hover {
 background-color: green;
}
.services:hover .dropdown {
 display: block;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding-left:  200px;
  padding-right: 150px
  margin-left: : 100px;
  padding-top: 80px;
  font-family: Serif;
  font-size: 21px;
  color: black;
  
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>
    <nav class="navbar">
     <!-- LOGO -->
     <div class="logo">PCs & Parts</div>
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- USING CHECKBOX HACK -->
       
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="/">Home</a></li>
         <li><a href="{{url('About_us')}}">About</a></li>
         
         <li class="services">
           <a href="/">Log In</a>
           <!-- DROPDOWN MENU -->
           <ul class="dropdown">
             <li><a href="{{url('vendorlogin')}}">Admin/Vendor </a></li>
             <li><a href="/">Buyer</a></li>
            </ul>
         </li>
         <li><a href="mailto:pcsandpartskenya@gmail.com">Contact</a></li>
         
         
       </div>
     </ul>
   </nav>
   <div class="about-section">
   
   

    <h2>Mission</h2>
    <p>PCs & Parts aims to stimulate the growth of computing in Kenya by putting the power to compute, </p>
    <p>build and maintain into the hands of the people</p>
    <p>Our ecosystem educates and provides the infrastructure to help this mission.</p>
    <p>Use PCs & Parts resources below to:</p>
    <ol>
        <li>Learn how to build a PC from scratch or by using a Raspberry Pi.</li>
        <li>Equipped yourself to source computer parts for your own needs or to start selling through our platform.</li>
        <li>Buy, sell and trade already assembled <a href="/pcs">PCs</a> or <a href="/parts">computer parts</a>.</li>
    </ol>

    <h2>Resources</h2>
    <div >
        <p>
            <a href="https://electronics.howstuffworks.com/how-to-tech/build-a-computer.htm" class="link-primary">Build a Computer from Scratch</a>
        </p>
        <p>
            <a href="https://www.pcworld.com/article/393182/how-to-build-a-100-dollar-pc-with-a-raspberry-pi-4.html" class="link-primary">Build a PC with a Raspberry Pi</a>
        </p>
        <p>
            <a href="https://www.zigofly.com/blog/how-to-shop-from-aliexpress-and-ship-to-kenya/#:~:text=AliExpress%20may%20sometimes%20offer%20free,half%20months%20to%20two%20months" class="link-primary">Sourcing Computer Parts on Ali Express</a>
        </p>
        <p>
            <a href="https://www.kenyabusiness.co.ke/best-computer-shops-in-nairobi/" class="link-primary">Best Computer Shops in Nairobi</a>
        </p>
        <p>
            <a href="https://thebestinkenya.co.ke/the-best-10-online-computer-shops-in-kenya/" class="link-primary">Best Online Computer Shops in Kenya</a>
        </p>
    </div>

  
   </div>


 
</body>
</html>

</body>
</html>