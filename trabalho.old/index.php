<?php
require_once('inc/topo.php');
session_start();
function aplicarCupons(){
   for($i=0; $i<count($_SESSION['cupons']); $i++){
      if($_SESSION['cupons'][$i] == "PHP"){
         $_SESSION['subtotal'] -= $_SESSION['subtotal']*0.1;
      }
      if($_SESSION['cupons'][$i] == "KaBum"){
         $_SESSION['subtotal'] -= $_SESSION['subtotal']*0.2;
      }
      if($_SESSION['cupons'][$i] == "Créditos Sociais"){
         $_SESSION['subtotal'] -= $_SESSION['subtotal']*0.99;
      }
   }
}
if(!isset($_SESSION['gpu'])){
   $_SESSION['gpu']=true;
}
if(!isset($_SESSION['quantidade'])){
   $_SESSION['quantidade']=1;
}
if(!isset($_SESSION['subtotal'])){
   $_SESSION['subtotal']=2949.90; 
}
if(!isset($_SESSION['cupons'])){
   $_SESSION['cupons'] = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   if(isset($_POST['menos'])){
      if(! ($_SESSION['quantidade']-1 < 0)){
         $_SESSION['quantidade']--;
         $_SESSION['subtotal'] = $_SESSION['quantidade']*2949.90;
         aplicarCupons();
      }
   }
   if(isset($_POST['mais'])){
      $_SESSION['quantidade']++;
      $_SESSION['subtotal'] = $_SESSION['quantidade']*2949.90;
      aplicarCupons();
   }
   if(isset($_POST["cupom"])){
      $jaAplicado=false;
      for($i=0; $i<count($_SESSION['cupons']); $i++){
         if($_SESSION['cupons'][$i]===$_POST['cupom']){
            $jaAplicado=true;
            break;
         }
      }
      if(!$jaAplicado){
         array_push($_SESSION['cupons'], $_POST['cupom']);
      }
      $_SESSION['subtotal'] = $_SESSION['quantidade']*2949.90;
      aplicarCupons();
   }
   if(isset($_POST["remover"])){
      $_SESSION['gpu']=false;
   }
}
?>
<html>
<body>
   <div class="main_content">
      <div class="section">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="table-responsive shop_cart_table">
                     <table class="table">
                        <thead>
                           <tr>
                              <th class="product-thumbnail"></th>
                              <th class="product-name">Produto</th>
                              <th class="product-price">Preço</th>
                              <th class="product-quantity">Quantidade</th>
                              <th class="product-subtotal">Subtotal</th>
                              <th class="product-remove">Remove</th>
                           </tr>
                        </thead>
                        <?php
                        if($_SESSION['gpu']){
                           echo '<tbody>
                                    <form method="post" action="" class="text-center mt-4">
                                       <tr>
                                          <td class="product-thumbnail"><a href=""><img src="http://localhost/ifc/trabalho/img/produto.jpg" alt="Placa de Vídeo Asus Dual NVIDIA GeForce RTX 2070 EVO V2 OC Edition, 8GB, GDDR6"></a></td>
                                          <td class="product-name" data-title="Product"><a href="">Placa de Vídeo Asus Dual NVIDIA GeForce RTX 2070 EVO V2 OC Edition, 8GB, GDDR6</a></td>
                                          <td class="product-price" data-title="Price">R$2.949,90</td>
                                          <td class="product-quantity" data-title="Quantity">
                                             <div class="quantity">
                                                <button type="submit" name="menos">-</button>
                                                <input type="text" disabled="" name="qtde_pedido_item" value="'.$_SESSION['quantidade'].'" title="Qty" class="qty" size="4">
                                                <button type="submit" name="mais">+</button>
                                             </div>
                                          </td>
                                          <td class="product-subtotal" data-title="Total">R$'.number_format($_SESSION['subtotal'], 2, ',', '.').'</td>
                                          <button class="product-remove qtde" name="remover" type="submit"><a href="#">X</a></button>
                                       </tr>
                                    </form>
                                 </tbody>';
                        }
                        ?>
                        <tfoot>
                           <tr>
                              <td colspan="6" class="px-0">
                                 <div class="row no-gutters align-items-center">
                                    <div class="col-lg-12 col-md-12 mb-12 mb-md-12">
                                       <div class="coupon field_form input-group">
                                          <div class="input-group-append">
                                             <form method="post" action="" class="text-center mt-4">
                                                <input type="text" name="cupom" value="" class="form-control form-control-sm" placeholder="Código do cupom">
                                                <button class="btn btn-fill-out btn-sm" type="submit">Aplicar cupom</button>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                        <a href="http://localhost/ifc/trabalho/login.php" class="btn btn-fill-out">Concluir compra</a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <div class="medium_divider"></div>
                  <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                  <div class="medium_divider"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
</html>
