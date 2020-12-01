<nav class="sidebar">
  <div class="closeBTN" style="height: 2rem; width: 2rem; background: yellow; position:absolute; right:0; top:0; margin: 2px 2px 0 0; display:flex; justify-content:center; align-items:center;">X</div>
  <div class="text">Side Menu</div>
  <ul>
    <li class="active"><a href="#">Dashboard</a></li>

    <li>
      <a href="#" class="sidebar-label-men" onclick="toggleSideViewOption('sidebarCat-men')">MEN
        <span class="fas fa-caret-down caret-sidebarCat-men"></span>
      </a>
      <ul class="sidebarCat-men" id="sidebarCat-men">

        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-male-top-wear')">Top Wear
            <span class="fas fa-caret-down caret-sidebar-option-male-top-wear"></span>
          </a>
          <ul class="sidebar-option-male-top-wear">
            <li><a href="<?php printf("$item","$site",'T-shirt')?>" class="p-0 mx-3 my-1">T-shirts</a></li>
            <li><a href="<?php printf("$item","$site",'Casual shirt')?>" class="p-0 mx-3 my-1">Casual shirts</a></li>
            <li><a href="<?php printf("$item","$site",'Formal shirts')?>" class="p-0 mx-3 my-1">Formal shirts</a></li>
            <li><a href="<?php printf("$item","$site",'Sweat shirts')?>" class="p-0 mx-3 my-1">Sweat shirts</a></li>
            <li><a href="<?php printf("$item","$site",'Jackets')?>" class="p-0 mx-3 my-1">Jackets</a></li>
            <li><a href="<?php printf("$item","$site",'Sweaters')?>" class="p-0 mx-3 my-1">Sweaters</a></li>
            <li><a href="<?php printf("$item","$site",'Blazers and coats')?>" class="p-0 mx-3 my-1">Blazers and coats</a></li>
            <li><a href="<?php printf("$item","$site",'Rain Jackets')?>" class="p-0 mx-3 my-1">Rain Jackets</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-male-festive-wear')">Festive Wear
            <span class="fas fa-caret-down caret-sidebar-option-male-festive-wear"></span>
          </a>
          <ul class="sidebar-option-male-festive-wear">
            <li><a href="<?php printf("$item","$site",'Kurta')?>" class="p-0 mx-3 my-1">Kurtas & Kurta Sets</a></li>
            <li><a href="<?php printf("$item","$site",'Sherwanis')?>" class="p-0 mx-3 my-1">Sherwanis</a></li>
            <li><a href="<?php printf("$item","$site",'Nehru Jackets')?>" class="p-0 mx-3 my-1">Nehru Jackets</a></li>
            <li><a href="<?php printf("$item","$site",'Dhotis')?>" class="p-0 mx-3 my-1">Dhotis</a></li>
            <li><a href="<?php printf("$item","$site",'Jackets')?>" class="p-0 mx-3 my-1">Jackets</a></li>
            <li><a href="<?php printf("$item","$site",'Sweaters')?>" class="p-0 mx-3 my-1">Sweaters</a></li>
            <li><a href="<?php printf("$item","$site",'Blazers')?>" class="p-0 mx-3 my-1">Blazers</a></li>
            <li><a href="<?php printf("$item","$site",'Coats')?>" class="p-0 mx-3 my-1">Coats</a></li>
            <li><a href="<?php printf("$item","$site",'Rain Jackets')?>" class="p-0 mx-3 my-1">Rain Jackets</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-male-bottom-wear')">Bottom Wear
            <span class="fas fa-caret-down caret-sidebar-option-male-bottom-wear"></span>
          </a>
          <ul class="sidebar-option-male-bottom-wear">
            <li><a href="<?php printf("$item","$site",'Jeans')?>" class="p-0 mx-3 my-1">Jeans</a></li>
            <li><a href="<?php printf("$item","$site",'Casual Trousers')?>" class="p-0 mx-3 my-1">Casual Trousers</a></li>
            <li><a href="<?php printf("$item","$site",'Formal Trousers')?>" class="p-0 mx-3 my-1">Formal Trousers</a></li>
            <li><a href="<?php printf("$item","$site",'Shorts')?>" class="p-0 mx-3 my-1">Shorts</a></li>
            <li><a href="<?php printf("$item","$site",'Track Pants  and Joggers')?>" class="p-0 mx-3 my-1">Track Pants and Joggers</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-male-inner-wear')" >Inner & Sleep Wear
            <span class="fas fa-caret-down caret-sidebar-option-male-inner-wear"></span>
          </a>
          <ul class="sidebar-option-male-inner-wear">
            <li><a href="<?php printf("$item","$site",'Briefs and Trunks')?>" class="p-0 mx-3 my-1">Briefs and Trunks</a></li>
            <li><a href="<?php printf("$item","$site",'Boxers')?>" class="p-0 mx-3 my-1">Boxers</a></li>
            <li><a href="<?php printf("$item","$site",'Vests')?>" class="p-0 mx-3 my-1">Vests</a></li>
            <li><a href="<?php printf("$item","$site",'Sleep wear')?>" class="p-0 mx-3 my-1">Sleep wear</a></li>
            <li><a href="<?php printf("$item","$site",'Lounge wear')?>" class="p-0 mx-3 my-1">Lounge wear</a></li>
            <li><a href="<?php printf("$item","$site",'Thermals')?>" class="p-0 mx-3 my-1">Thermals</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-male-foot-wear')">Foot Wear
            <span class="fas fa-caret-down caret-sidebar-option-male-foot-wear"></span>
          </a>
          <ul class="sidebar-option-male-foot-wear">
            <li><a href="<?php printf("$item","$site",'Casual shoes')?>" class="p-0 mx-3 my-1">Casual shoes</a></li>
            <li><a href="<?php printf("$item","$site",'Formal shoes')?>" class="p-0 mx-3 my-1">Formal shoes</a></li>
            <li><a href="<?php printf("$item","$site",'Sport shoes')?>" class="p-0 mx-3 my-1">Sport shoes</a></li>
            <li><a href="<?php printf("$item","$site",'Sneakers')?>" class="p-0 mx-3 my-1">Sneakers</a></li>
            <li><a href="<?php printf("$item","$site",'Sandals')?>" class="p-0 mx-3 my-1">Sandals & Floaters</a></li>
            <li><a href="<?php printf("$item","$site",'Flip Flop')?>" class="p-0 mx-3 my-1">Flip Flop</a></li>
            <li><a href="<?php printf("$item","$site",'Socks')?>" class="p-0 mx-3 my-1">Socks</a></li>
          </ul>
        </li>

      </ul>
    </li>
    
    <li>
      <a href="#" class="serv-btn" onclick="toggleSideViewOption('sidebarCat-women')">WOMEN
        <span class="fas fa-caret-down caret-sidebarCat-women"></span>
      </a>
      <ul class="sidebarCat-women">

        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-fusion-wear')">Indian/Fusion Wear
            <span class="fas fa-caret-down caret-sidebar-option-fusion-wear"></span>
          </a>
          <ul class="sidebar-option-fusion-wear">
          <li><a href="#" class="p-0 mx-3 my-1">Kurtas & Suits</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Kurtis,Tunics & Tops</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Ethnic Dresses</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Leggings, Salwars & Chudidars</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Skirts & Plazzos</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Sarees</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Dress Materials</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Lehnga Cholis</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Dupattas & Shawls</a></li>
          <li><a href="#" class="p-0 mx-3 my-1">Jackets & WaistCoats</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-female-western-wear')">Western Wear
            <span class="fas fa-caret-down caret-sidebar-option-female-western-wear"></span>
          </a>
          <ul class="sidebar-option-female-western-wear">
            <li><a href="#" class="p-0 mx-3 my-1">Dresses</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Jump Suits</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Tops, T-shirts & Shirts</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Jeans & Jeggings</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Trousers & Capris</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Shorts & Skirts</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Shrugs</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Swaters & Sweatshirts</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Jackets & Coats</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Blazzers & Waistcoats</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-female-foot-wear')">Footwear
            <span class="fas fa-caret-down caret-sidebar-option-female-foot-wear"></span>
          </a>
          <ul class="sidebar-option-female-foot-wear">
            <li><a href="#" class="p-0 mx-3 my-1">Flats</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Casual shoes</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Heels</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Boots</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Sports Shoes & Floaters</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-female-sleep-wear')">Inner & Sleep Wear
            <span class="fas fa-caret-down caret-sidebar-option-female-sleep-wear"></span>
          </a>
          <ul class="sidebar-option-female-sleep-wear">
            <li><a href="<?php printf("$item","$site",'Briefs and Trunks')?>" class="p-0 mx-3 my-1">Briefs and Trunks</a></li>
            <li><a href="<?php printf("$item","$site",'Boxers')?>" class="p-0 mx-3 my-1">Boxers</a></li>
            <li><a href="<?php printf("$item","$site",'Vests')?>" class="p-0 mx-3 my-1">Vests</a></li>
            <li><a href="<?php printf("$item","$site",'Sleep wear')?>" class="p-0 mx-3 my-1">Sleep wear</a></li>
            <li><a href="<?php printf("$item","$site",'Lounge wear')?>" class="p-0 mx-3 my-1">Lounge wear</a></li>
            <li><a href="<?php printf("$item","$site",'Thermals')?>" class="p-0 mx-3 my-1">Thermals</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-female-sports-wear')">Sports/Active Wear
            <span class="fas fa-caret-down caret-sidebar-option-female-sports-wear"></span>
          </a>
          <ul class="sidebar-option-female-sports-wear">
            <li><a href="#" class="p-0 mx-3 my-1">clothings</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Footwear</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Sports Accessiories</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Sports Equipments</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#" class="fea-btn" onclick="toggleSideViewOption('sidebar-option-female-inner-wear')" >Lingerie/Inner Wear
            <span class="fas fa-caret-down caret-sidebar-option-female-inner-wear"></span>
          </a>
          <ul class="sidebar-option-female-inner-wear">
            <li><a href="#" class="p-0 mx-3 my-1">Bra</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Briefs</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Shapewears</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Sleepwear & Loungewear</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Swimwear</a></li>
            <li><a href="#" class="p-0 mx-3 my-1">Camisoles & Thermals</a></li>
          </ul>
        </li>

      </ul>
    </li>

  </ul>
</nav>