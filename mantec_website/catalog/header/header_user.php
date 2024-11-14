 <!-- Notification 3 -->
 <?php if (isset($_SESSION['success'])) : ?>
   <div class="notifications" id="success">
     <script>
       $(document).ready(function() {
         <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
           const notifications = document.querySelector(".notifications");
           const toastDetails = {
             timer: 5000,
             success: {
               icon: 'fa-circle-check',
               text: 'Success: This is a success toast.',
             },
             error: {
               icon: 'fa-circle-xmark',
               text: 'Error: This is an error toast.',
             },
             warning: {
               icon: 'fa-triangle-exclamation',
               text: 'Warning: This is a warning toast.',
             },
             info: {
               icon: 'fa-circle-info',
               text: 'Info: This is an information toast.',
             }
           }

           const removeToast = (toast) => {
             toast.classList.add("hide");
             if (toast.timeoutId) clearTimeout(toast.timeoutId); // Clearing the timeout for the toast
             setTimeout(() => toast.remove(), 500); // Removing the toast after 500ms
           }


           const createToast = (id) => {
             // Getting the icon and text for the toast based on the id passed
             const {
               icon,
               text
             } = toastDetails[id];
             const toast = document.createElement("li"); // Creating a new 'li' element for the toast // Setting the classes for the toast
             toast.className = `toast ${id}`;
             // Setting the inner HTML for the toast
             toast.innerHTML = `<div class="column">
                         <i class="fa-solid ${icon}"></i>
                         <span>Success: <?php echo $_SESSION['success']; ?></span>
                      </div>
                      <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
             notifications.appendChild(toast); // Append the toast to the notification ul
             // Setting a timeout to remove the toast after the specified duration
             toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
           }

           createToast(notifications.id).innerHTML
         <?php }
          unset($_SESSION['success']);
          ?>
       });
     </script>

   </div>
 <?php endif ?>
 <nav class="bg-navbar">
   <div class="nav-container">
     <a href="index.php">
       <img src="imgs/logo.png" class="logonav">
     </a>
     <p class="nav-profile-name">Mantec Shop</p>
     <!-- sidebar search center -->
     <input onkeyup="searchsomething(this)" id="txt_search" type="text" class="sidebar-search-center" placeholder="ค้นหาสินค้า">
     <!-- profile -->
     <div class="nav-profile">

       <!-- user profile -->
       <div class="profile-dropdown">
         <div onclick="toggle()" class="profile-dropdown-btn">
           <div class="profile-img">
             <i class="fa-solid fa-circle"></i>
           </div>

           <span>
             <?php echo $_SESSION['username']; ?>
             <i class="fa-solid fa-angle-down"></i>
           </span>
         </div>

         <ul class="profile-dropdown-list">


           <li class="profile-dropdown-list-item">
             <a href="../../../mantec_website/catalog/admin/about/index.php">
               <i class="fa-regular fa-user"></i>
               Edit Profile
             </a>
           </li>

           <li class="profile-dropdown-list-item">
             <a href="index.php?logout='1'">
               <i class="fa-solid fa-arrow-right-from-bracket"></i>
               Log out
             </a>
           </li>
         </ul>
       </div>

       <div onclick="openCart()" style="cursor: pointer;" class="nav-profile-cart">
         <i class="fas fa-cart-shopping"></i>
         <div id="cartcount" class="cartcount" style="display: none;">
           0
         </div>
       </div>

       <!--  logged in user information -->
       <?php if (isset($_SESSION['username'])) : ?>
       <?php endif ?>
     </div>

   </div>
   <div class="nav-menu">
     <ul class="nav-menu-container">
       <a href="index.php">
         <li>หน้าแรก</li>
       </a>
       <a href="index.php">
         <li>กิจกรรม</li>
       </a>
       <a href="index.php">
         <li>บริการส่งซ่อม/ส่งเคลม</li>
       </a>
       <a href="index.php">
         <li>ติดต่อ</li>
       </a>
     </ul>
   </div>
 </nav>

 <script src="profile_dropdown.js"></script>