<?php
/**
 * Created by PhpStorm.
 * User: s14004402
 * Date: 10/03/16
 * Time: 15:19
 */

require_once 'page-builder.php';

$script = array();

page_head('Deck Building', $script);

echo '
    <div id="all" style="display: none"><br/>
        <form id="nommage" method="post" action="nommer-deck.php">
            <table>
                <tr>
	                <td><label>Nom du Deck : </label></td>
	                <td><input type="text" name="nom"/></td>
	            </tr>
	            <tr>
	                <td><input type="submit" name="submit"/></td>
	            </tr>
	        </table>
	    </form>

        <div id="choixType" style="display: none">
            <a href="javascript:void(0)" onclick="dispSNum();">Search by Num</a> / <a href="javascript:void(0)" onclick="dispSSerie();">Search by Serie</a>
        </div>

        <br/>

        <div id="deck" style="display: none">
            <label> Deck : </label>
            <label id="nbCard">0/50</label>

        <br/><br/>

        </div>

        <br/><br/>

        <form id="cardSearchNum" action="card-search.php" method="post" style="display: none">
            <table>
                <tr>
	                <td><label>Numéro Carte : </label></td>
	                <td><input type="text" name="card"/></td>
	            </tr>
	            <tr>
	                <td><input type="submit" name="submit"/></td>
	            </tr>
	        </table>
        </form>

        <form id="cardSearchSerie" action="serie-search.php" method="get" style="display: none">
            <table>
                <tr>
                    <td><label>Choix de la série : </label></td>
	                <td><select name="serie">
                            <option>Angel Beats / Kud Wafter</option>
                            <option>Accel World</option>
                            <option>Attack On Titans</option>
                            <option>Monogatari Series</option>
                            <option>Black Rock Shooter</option>
                            <option>Charlotte</option>
                            <option>Clannad</option>
                            <option>CANAAN</option>
                            <option>Crayon Shin-Chan</option>
                            <option>Da Capo</option>
                            <option>Dog Days</option>
                            <option>Disgaea</option>
                            <option>Devil Survivor 2</option>
                            <option>New Evangelion</option>
                            <option>Fate</option>
                            <option>FAIRY TAIL</option>
                            <option>Guilty Crown</option>
                            <option>Gril Friend Beta</option>
                            <option>Gargantia on the Verdurous Planet</option>
                            <option>Gigant Shooter Tsukasa</option>
                            <option>Day Break Illusion</option>
                            <option>A Certain Magical Index / A Certain Scientific Railgun</option>
                            <option>Idolm@ster</option>
                            <option>Idolmaster Cinderella Girls</option>
                            <option>Kantai Collection ~KanColle~</option>
                            <option>THE KING OF FIGHTERS</option>
                            <option>Katanagatari</option>
                            <option>MELTY BLOOD / Kara no Kyoukai</option>
                            <option>Kill La Kill</option>
                            <option>Little Busters!</option>
                            <option>Log Horizon</option>
                            <option>Love Live!</option>
                            <option>Lucky Star</option>
                            <option>Macross Frontier</option>
                            <option>The Girl Who Leapt Through Space / My-Hime & My-Otome</option>
                            <option>Detective Opera Milky Holmes</option>
                            <option>Madoka Magica</option>
                            <option>Magical Girl Lyrical Nanoha</option>
                            <option>Nichijou</option>
                            <option>Nisekoi</option>
                            <option>Persona</option>
							<option>Hatsune Miku Project DIVA</option>
							<option>Prisma☆Illya</option>
							<option>Psycho-Pass</option>
							<option>Phantom -Requiem for the Phantom-</option>
							<option>Puyo Puyo</option>
							<option>Robotics;Notes</option>
							<option>Rewrite</option>
							<option>Sword Art Online</option>
							<option>Sengoku BASARA</option>
							<option>Shining Series</option>
							<option>Symphogear</option>
							<option>Schoolgirl Strikers</option>
							<option>Shining Resonance</option>
							<option>Shakugan no Shana</option>
							<option>The Melancholy of Haruhi Suzumiya</option>
							<option>Terra Formars</option>
							<option>To Love-Ru</option>
							<option>Visual Arts</option>
							<option>Vividred Operation</option>
							<option>Wooser\'s Hand-to-Mouth Life</option>
							<option>Familiar of Zero</option>

                        </select>
                    </td>
	            </tr>
	            <tr>
	                <td><input type="submit" name="submitS"></td>
                </tr>
	        </table>
	    </form>

        <div id="cardSearchResult" style="display: none">

        </div>

        <br/>

        <a href="javascript:void(0)" onclick="showDeckConstrutionRules();" id="showRules">Les règles de construction de deck</a>
        <a href="javascript:void(0)" onclick="hideDeckConstrutionRules();" id="hideRules" style="display: none">Les règles de construction de deck</a>


        <div id="deckRules" style="display: none">
            <pre>
les règles de construction de deck :

Une seule série autorisé pour le deck.
Le deck builder est fait de manière a ce qu\'il
sorte toutes les cartes autorisées pour la série (hors les cartes pour tous les set)

Pas plus de 4 fois une carte ayant le même nom,
sauf si l\'effet de la carte dis le contraire
(par exemple : "cette carte peut être autant de fois que voulu dans le deck."
ou "cette carte et [NomCarte] ne peuvent pas être plus d\'un total de 4 fois dans le deck").
Cela prends donc en compte les rareté des cartes : AB/W11-001 et AB/W11-001SP ne peuvent pas être
un total de 4 fois dans le deck (3 / 1 ou 2 / 2 autorisé, 4 / 1 interdit...)

8 Climax (carte format paysage) Maximum. Il est possible d\'en
 mettre moins mais c\'est souvent une mauvaise idée. Ces cartes respectent aussi la règle ci-dessus.

50 cartes minimum ET maximum dans le deck.

Le deck doit suivre la banlist suivante :
Da Capo :
- 1 parmis 2 :
	* Anzu in Swimsuits DC/W01-091
	* Xylophone Fortune Reading DC/W01-095

Little Busters :
- Bannis :
	* Rest! LB/W09-96

Melancholy of Harui Suzumiya :
- Bannis :
	* World with Faded Colors SY/W08-071

Crayon Shin-Chan :
- Pas plus d\'1 copie :
	* Action Mask, Sealed Fists CS/S28-P01

Index/Railgun :
- Pas plus de 2 copies :
	* Mikoto & Kuroko, Under One Roof RG/W13-052, RG/W13-052S

Personna :
- Bannis :
	* Akinari Kamiki P3-S01-014

Disgaea :
- Pas plus d\'1 copie :
	* Supreme Overlord Laharl DG/S02-T17, DG/S02-061

Shinning Series :
- Bannis :
	* Cyrille, Changing Clothes SE/S04-080

Tantei Opera Milky Holmes :
- Bannis :
	* Cordelia\'s Garden MK/S11-096

Kantai Collection :
- Bannis :
	* Junyou, 2nd Hiyou-class Light Aircraft Carrier KC/S25-028
- 1 parmis 3 :
	* Hatsukaze, 7th Kagero-class Destroyer KC/S25-006
	* Hibiki, 2nd Akatsuki-class Destroyer KC/S25-056
	* Akagi Kai, Akagi-class Aircraft Carrier KC/S25-035, KC/S25-035SP

Nisekoi :
- Pas plus d\'1 copie :
	* Marika, Maiden\'s Heart NK/W30-052, NK/W30-052SP
- 1 parmis 3 :
	* Pendant of Promise NK/W30-T08, NK/W30-022, NK/W30-046, NK/W30-071, NK/W30-097
	* Kosaki, Angel in White Clothing NK/W30-081, NK/W30-081S
	* Raku, Being Similar NK/W30-084
            </pre>
        </div>
		
		<div>
			<p>Heart Of The Card n\'autorise pas l\'utilisation de leurs traductions. Ceci est la raison pour laquelle il n\'y a aucun effet de carte sur ce site.</p>
		</div>

        <br/><br/>

        <a href="index.php">Deck List</a>
    </div>';

page_foot();