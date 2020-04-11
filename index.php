<?php

if(isset($_GET['submit'])){
    $nameInput = htmlspecialchars($_GET['username']);
    $platform = htmlspecialchars($_GET['platform']);

    $userData = json_decode(file_get_contents("http://localhost/r6stats-api-v2/getStats/getUser.php?name=$nameInput&platform=$platform&appcode=809965"), true);

    $playerId = key($userData['players']);

    if(!array_key_exists('error', $userData['players'][$playerId])){
        if($userData['players'][$playerId]['deaths'] != 0){
            $playerKd = round($userData['players'][$playerId]['kills']/$userData['players'][$playerId]['deaths'], 2);
        } else {
            $playerKd = NAN;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php require('header.php'); ?>
    <div class="main-page">
        <div class="rainbowsix-logo"></div>
        <div class="container-left">
            <div class="searchbox">
                <form action="index.php" method="GET">
                    <table>
                        <tbody>
                            <tr>
                                <td >
                                    <input id="cursor-end" autofocus class="search-player-input" name="username" placeholder="Search player.." <?php if(isset($_GET['submit'])){?> value="<?php echo htmlspecialchars($nameInput) ?>" <?php } ?>/>
                                </td>
                                <td class="platformbox">
                                    <label class="radio">
                                        <input type="radio" name="platform" checked="checked" value="uplay"><span class="fab fa-windows fa-lg uplay"></span>
                                    </label>
                                </td>
                                <td class="platformbox">
                                    <label class="radio">
                                        <input type="radio" name="platform"<?php if (isset($platform) && htmlspecialchars($platform)=="psn") {?>checked="checked"<?php }?> value="psn"><span class="fab fa-playstation fa-lg psn"></span>
                                    </label>
                                </td>
                                <td class="platformbox">
                                    <label class="radio">
                                    <input type="radio" name="platform"<?php if (isset($platform) && htmlspecialchars($platform)=="xbl") {?>checked="checked"<?php }?> value="xbl"><span class="fab fa-xbox fa-lg xbl"></span>
                                    </label>
                                </td>
                                <td>
                                    <input type="submit" name="submit" value="submit" class="hide">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="results">
                <div class="h2-results">
                    <h2>Results</h2>
                </div>
                <div class="players">
                    <?php if(isset($_GET['submit'])){ ?>
                        <?php if(!array_key_exists('error', $userData['players'][$playerId])){ ?>
                            <a href="player.php?username=<?php echo htmlspecialchars($nameInput) ?>&platform=<?php echo htmlspecialchars($platform) ?>&submit=submit">
                                <div class="playerstats">
                                    <div class="rank-logo">
                                        <img src="<?php echo htmlspecialchars($userData['players'][$playerId]['rankInfo']['image']) ?>" alt="rank"></img>
                                    </div>
                                    <div class="stats">
                                        <h4><?php echo htmlspecialchars($userData['players'][$playerId]['nickname']) ?></h4>
                                        <div class="prev-stats">
                                            <p class="level">
                                                <span class="aternate-text">level: </span><?php echo htmlspecialchars($userData['players'][$playerId]['level']) ?>
                                            </p>
                                            <p class="kd">
                                                <span class="aternate-text">KD: </span><?php echo htmlspecialchars($playerKd) ?>
                                            </p>
                                            <p class="rank">
                                                <span class="aternate-text">MMR: </span><?php echo htmlspecialchars($userData['players'][$playerId]['mmr']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } else { ?>
                            <div class="error-message">
                                <h4>
                                    <?php echo htmlspecialchars($userData['players'][$playerId]['error']['message']) ?>
                                </h4>
                                <p>Please check your spelling and make sure you are searching by the correct platform.</p>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container-right">
            <div class="header-container-right">
                <h2>###</h2>
            </div>
            <div class="content-container-right">
                ###
            </div>
        </div>
        <?php //print("<pre>".print_r($userData,true)."</pre>"; ?>
    </div>
    <script src="dist/js/setCaretPos.js"></script>
    <script src="dist/js/searchBar.js"></script>
    <?php require('footer.php'); ?>
</body>
</html>