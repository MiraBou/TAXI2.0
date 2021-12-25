<?php include'header.php';?>
              <div id="left2">
              
                    <div id="container">
                      <form action="trait.php" method="POST">
                      &nbsp Source :
                      <select name="source" class="flex-container">
                        <option value="1">Lissasefa</option>
                        <option value="0">L'mdina</option>
                        <option value="2">Maarif</option>
                        <option value="3">Oulfa</option>
                        <option value="4">Ain Diab</option>
                        <option value="5">Hay Hassani</option>
                        <option value="6">Sidi Maarouf</option>

                      </select>
                        <br>
                      &nbsp Destination :
                      <select name="destination" class="flex-container">
                        <option value="0">L'mdina</option>
                        <option value="1">Lissasefa</option>
                        <option value="2">Maarif</option>
                        <option value="3">Oulfa</option>
                        <option value="4">Ain Diab</option>
                        <option value="5">Hay Hassani</option>
                        <option value="6">Sidi Maarouf</option>

                      </select>

                     <input type="submit" value="Trouver le plus court chemin !" class="submit">
                      </form>

                    </div>

                  </div>
          </div>
        <div id="right">
          <div id="right1">
            <div id="menu">
              <div class="menuyat" onclick="alert('C A S A')">Casablanca</div>
              <div class="menuyat" onclick="alert('Réalisé par : Mira Boussarendal & Ghizlane Lmerzagui')">M&G</div>


            </div>
            <span id="citation">" Prendre un TAXI à Casablanca n'est pas toujours facile ! "</span>
            </div>
          <div id="right2">
            <img src="Repo/casa.png" id="logo-casa">
            </div>
          </div>
    </div>
  </body>
</html>
