<!DOCTYPE html>
<html>
<head>
    <title>PCs & Parts</title>
    <style>
body {
  background-image: url('https://appuals.com/wp-content/uploads/2019/06/kv-pd.png');
  background-repeat: no-repeat;
  background-size: cover;
  font-family: cursive;
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
.about-section {
    margin-top: 30px;
  padding: 50px;
  background: : rgba(0, 0, 0, 0);
  text-align: center;
  font-size: 30px;  
  color: #32cd32;
  vertical-align: middle;
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
   
        
        <h1>Buy, Sell & Trade PCs & Computer Parts with Local Kenyans</h1>
   </div>


 </body>
</html>

</body>
</html>