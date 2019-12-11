<?php

namespace IndoParticle;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;

use pocketmine\level\particle\AngryVillagerParticle;
use pocketmine\level\particle\HeartParticle;
use pocketmine\level\particle\FlameParticle;
use pocketmine\level\particle\SmokeParticle;
use pocketmine\level\particle\WaterDripParticle;
use pocketmine\level\particle\RedstoneParticle;
use pocketmine\level\particle\HappyVilaggerParticle;
use pocketmine\level\particle\LavaParticle;
use pocketmine\level\particle\DustParticle;
use pocketmine\level\particle\BubbleParticle;
use pocketmine\level\particle\EnchantParticle;
use pocketmine\level\particle\NoteParticle;
use pocketmine\level\particle\EnchantmentTableParticle;
use pocketmine\level\particle\RainSplashParticle;
use pocketmine\level\particle\ExplodeParticle;
use pocketmine\level\particle\InkParticle;

use pocketmine\plugin\Plugin;
use pocketmine\Server;
use pocketmine\scheduler\Task as PluginTask;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use jojoe77777\FormAPI;

class Main extends PluginBase implements Listener{
	
	public $players = [];
    public $particle1 = array("CrownHeartParticles");
    public $particle2 = array("LaserParticles");
    public $particle3 = array("TornadoParticles");
    public $particle4 = array("SonicBoomParticles");
	public $particle5 = array("DringParticles");
	public $particle6 = array("EnchantParticles");
	public $particle7 = array("InkParticles");
	public $particle8 = array("EnchantmentTableParticles");
	public $particle9 = array("DustParticles");
	public $particle10 = array("RainSplashParticles");
    public $name = array();
	
	public function onEnable()
	{
		$this->getLogger()->info("[Enable] Plugin dibuat oleh xSoapers");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getScheduler()->scheduleRepeatingTask(new Particle($this), 5);
	}
	
    public function checkDepends(){
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->info("[Disable] Perlu plugin FormAPI!");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }
	
	public function onCommand(CommandSender $player, Command $command, string $label, array $params) : bool
	{
	$name = $player->getName();
		if(!$player instanceof Player){
			$player->sendMessage("Gunakan Command Dalam Game");
			return false;
		}
		$username = strtolower($player->getName());
        if($command->getName() == "pui"){
            if(!($player instanceof Player)){
                    $player->sendMessage("§7 Anda Tidak Memiliki Izin Perintah");
                    return true;
            }
            $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $player, $data){
                $result = $data;
                if ($result == null) {
                }
                switch ($result) {
                        case 0:
                            break;
                        case 1:
                        $command = "pcrownheart";
								    $this->getServer()->getCommandMap()->dispatch($player, $command);
						    break;
						case 2:
                        $command = "plaser";
								    $this->getServer()->getCommandMap()->dispatch($player, $command);
						    break;
						case 3:
                        $command = "ptornado";
								    $this->getServer()->getCommandMap()->dispatch($player, $command);
						    break;
						case 4:
                        $command = "psboom";
								    $this->getServer()->getCommandMap()->dispatch($player, $command);
						    break;
						case 5:
                        $command = "pdring";
								    $this->getServer()->getCommandMap()->dispatch($player, $command);
							break;
						case 6:
						$command = "peffect";
									$this->getServer()->getCommandMap()->dispatch($player, $command);
							break;
						case 7:
		$command = "pnote";
		$this->getServer()->getCommandMap()->dispatch($player, $command);
		break;
		case 8:
		$command = "penc";
		$this->getServer()->getCommandMap()->dispatch($player, $command);
		break;
		case 9:
		$command = "pdust";
		$this->getServer()->getCommandMap()->dispatch($player, $command);
		break;
		case 10:
		$command = "prain";
                $this->getServer()->getCommandMap()->dispatch($player, $command);
		break;
						
                }
            });
            $form->setTitle("§l§dTWICE§e PARTICLE");
            $form->addButton("§c§lKEMBALI");
            $form->addButton("§0§lCROWN HEART");
            $form->addButton("§0§lLASER");
            $form->addButton("§0§lTORNADO");
            $form->addButton("§0§lSONIC BOOM");
            $form->addButton("§0§lDRING");
	    $form->addButton("§0§lSPELL");
	    $form->addbutton("§0§lNOTE");
	    $form->addButton("§0§lENCHANT");
	    $form->addButton("§0§lDUST");
	    $form->addButton("§l§0RAIN");
            $form->sendToPlayer($player);
        }
		if($command->getName() == "pcrownheart"){
			if(!in_array($name, $this->particle1)) {
				
			    $this->particle1[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eCrownHeart §aEnabled");
			
		    } else {
			    
			    unset($this->particle1[array_search($name, $this->particle1)]);
				$player->sendMessage("§4x§9Particle §b>> §eCrownHeart §cDisable");
			}
		}
		if($command->getName() == "plaser"){
			if(!in_array($name, $this->particle2)) {
				
			    $this->particle2[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eLaser §aEnabled");
			
		    } else {
			    
			    unset($this->particle2[array_search($name, $this->particle2)]);
				$player->sendMessage("§4x§9Particle §b>> §eLaser §cDisable");
			}
		}
		if($command->getName() == "ptornado"){
			if(!in_array($name, $this->particle3)) {
				
			    $this->particle3[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eTornado §aEnabled");
			
		    } else {
			    
			    unset($this->particle3[array_search($name, $this->particle3)]);
				$player->sendMessage("§4x§9Particle §b>> §eTornado §cDisable");
			}
		}
		if($command->getName() == "psboom"){
			if(!in_array($name, $this->particle4)) {
				
			    $this->particle4[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eTornado §aEnabled");
			
		    } else {
			    
			    unset($this->particle4[array_search($name, $this->particle4)]);
				$player->sendMessage("§4x§9Particle §b> §eTornado §cDisable");
			}
		}
		if($command->getName() == "pdring"){
			if(!in_array($name, $this->particle5)) {
				
			    $this->particle5[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eDring §aEnabled");
			
		    } else {
			    
			    unset($this->particle5[array_search($name, $this->particle5)]);
				$player->sendMessage("§4x§9Particle §b>> §eDring §cDisable");
			}
		}
		if($command->getName() == "peffect"){
			if(!in_array($name, $this->particle6)) {
				
			    $this->particle6[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eMob Spell §aEnabled");
			
		    } else {
			    
			    unset($this->particle6[array_search($name, $this->particle6)]);
				$player->sendMessage("§4x§9Particle §b>> §eMob Spell §cDisable");
			}
		}
		if($command->getName() == "pnote"){
			if(!in_array($name, $this->particle7)) {
				
			    $this->particle7[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eNote §aEnabled");
			
		    } else {
			    
			    unset($this->particle7[array_search($name, $this->particle7)]);
				$player->sendMessage("§4x§9Particle §b>> §eNote §cDisable");
			}
		}
		if($command->getName() == "penc"){
			if(!in_array($name, $this->particle8)) {
				
			    $this->particle8[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eEnchant §aEnabled");
			
		    } else {
			    
			    unset($this->particle8[array_search($name, $this->particle8)]);
				$player->sendMessage("§4x§9Particle §b>> §eEnchant §cDisable");
			}
		}
		if($command->getName() == "pdust"){
			if(!in_array($name, $this->particle9)) {
				
			    $this->particle9[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eDust §aEnabled");
			
		    } else {
			    
			    unset($this->particle9[array_search($name, $this->particle9)]);
				$player->sendMessage("§4x§9Particle §b>> §eDust §cDisable");
			}
		}
		if($command->getName() == "prain"){
			if(!in_array($name, $this->particle10)) {
				
			    $this->particle10[] = $name;
			    $player->sendMessage("§4x§9Particle §b>> §eRain §aEnabled");
			
		    } else {
			    
			    unset($this->particle10[array_search($name, $this->particle10)]);
				$player->sendMessage("§4x§9Particle §b>> §eRain §cDisable");
			}
		}
		return true;
	}
}

class Particle extends PluginTask {
	
	public function __construct($plugin) {
		$this->plugin = $plugin;
	}

	public function onRun($tick) {
		
		foreach($this->plugin->getServer()->getOnlinePlayers() as $player) {
			$name = $player->getName();
			$inv = $player->getInventory();
			
			$players = $player->getLevel()->getPlayers();
			$level = $player->getLevel();
			
			$x = $player->getX();
			$y = $player->getY();
			$z = $player->getZ();
			
			if(in_array($name, $this->plugin->particle1)) {
				
				$center = new Vector3($x, $y+0.8, $z);
				$particle = new HeartParticle($center);
				
				    $time = 1;
	                $pi = 3.14159;
	                $time = $time+0.1/$pi;
	                for($i = 0; $i <= 2*$pi; $i+=$pi/8){
					$x = $time*cos($i) + $center->x;
					$y = exp(-0.1*$time)*sin($time) + $center->y;
					$z = $time*sin($i) + $center->z;
					
					$particle->setComponents($x, $y+0.8, $z);
					$level->addParticle($particle);
						
				}
		    }
		    
			if(in_array($name, $this->plugin->particle2)) {
				
				$center = new Vector3($x, $y+0.5, $z);
				$particle = new FlameParticle($center);
				
				$direction = $player->getDirectionVector();
				for($i = 0; $i < 40; ++$i){
					$x = $i*$direction->x+$player->x;
	                $y = $i*$direction->y+$player->y;
	                $z = $i*$direction->z+$player->z;
					
					$particle->setComponents($x, $y+0.5, $z);
					$level->addParticle($particle);
						
				}
		    }
		    
			if(in_array($name, $this->plugin->particle3)) {
				
				$center = new Vector3($x, $y+0.5, $z);
				$particle = new FlameParticle($center);
				
	            for($yaw = 0, $y = $center->y; $y < $center->y + 2; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
                   $x = -sin($yaw) + $center->x;
                   $z = cos($yaw) + $center->z;
					
					$particle->setComponents($x, $y+0.5, $z);
					$level->addParticle($particle);
						
				}
		    }
		    
			if(in_array($name, $this->plugin->particle4)) {
				
				$center = new Vector3($x, $y, $z);
				$particle = new AngryVillagerParticle($center);
				
				$time = 1;
	            $pi = 3.14159;
	            $time = $time+0.1/$pi;
	            for($i = 0; $i <= 2*$pi; $i+=$pi/8){
		        $x = $time*cos($i) + $player->x;
		        $z = exp(-0.1*$time)*sin($time) + $player->z;
				$y = $time*sin($i) + $player->y;
				
				    $particle->setComponents($x, $y, $z);
					$level->addParticle($particle);
				
				}
		    }
		    
			if(in_array($name, $this->plugin->particle5)) {
				
				$center = new Vector3($x, $y, $z);
				$particle = new WaterDripParticle($center);
				
				$time = 1;
	            $pi = 3.14159;
	            $time = $time+0.1/$pi;
	            for($i = 0; $i <= 2*$pi; $i+=$pi/8){
		        $x = $time*cos($i) + $center->x;
				$y = exp(-0.1*$time)*sin($time) + $center->y;
				$z = $time*sin($i) + $center->z;
					
					$particle->setComponents($x, $y, $z);
					$level->addParticle($particle);
						
				}
			}
			
			if(in_array($name, $this->plugin->particle6)) {
				
				$center = new Vector3($x, $y+0.5, $z);
				$particle = new EnchantParticle($center);
				
				$direction = $player->getDirectionVector();
				for($i = 0; $i < 40; ++$i){
					$x = $i*$direction->x+$player->x;
	                $y = $i*$direction->y+$player->y;
	                $z = $i*$direction->z+$player->z;
					
					$particle->setComponents($x, $y+0.5, $z);
					$level->addParticle($particle);
						
				}
			}

			if(in_array($name, $this->plugin->particle7)) {

				$center = new Vector3($x, $y-0.5, $z);
				$particle = new InkParticle($center);
			   
				$time = 1;
				$pi = 3.14159;
				$time = $time+0.1/$pi;
				 for($yaw = 0, $y = $center->y; $y < $center->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
				    $x = -sin($yaw) + $center->x;
				    $z = cos($yaw) + $center->z;

					$particle->setComponents($x, $y-0.5, $z);
					$level->addParticle($particle);
						
				}
			}

			if(in_array($name, $this->plugin->particle8)) {
				
				$center = new Vector3($x, $y, $z);
				$particle = new EnchantmentTableParticle($center);
				
				$time = 1;
				$pi = 3.14159;
				$time = $time+0.1/$pi;
				 for($yaw = 0, $y = $center->y; $y < $center->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
				    $x = -sin($yaw) + $center->x;
				    $z = cos($yaw) + $center->z;

					$particle->setComponents($x, $y, $z);
					$level->addParticle($particle);
						
				}
			}

			if(in_array($name, $this->plugin->particle9)) {
 
				$r = 0;
				$g = 0;
				$b = 255;
				
				$center = new Vector3($x, $y-0.5, $z);
				$particle = new DustParticle($center, $r, $g, $b, 1);
			   
				$time = 1;
				$pi = 3.14159;
				$time = $time+0.1/$pi;
				 for($yaw = 0, $y = $center->y; $y < $center->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
				    $x = -sin($yaw) + $center->x;
				    $z = cos($yaw) + $center->z;

					$particle->setComponents($x, $y-0.5, $z);
					$level->addParticle($particle);

				}
			}

			if(in_array($name, $this->plugin->particle10)) {

				$center = new Vector3($x, $y, $z);
				$particle = new RainSplashParticle($center);
				
				$time = 1;
	            $pi = 3.14159;
	            $time = $time+0.1/$pi;
	            for($i = 0; $i <= 2*$pi; $i+=$pi/8){
		        $x = $time*cos($i) + $center->x;
				$y = exp(-0.1*$time)*sin($time) + $center->y;
				$z = $time*sin($i) + $center->z;
					
					$particle->setComponents($x, $y, $z);
					$level->addParticle($particle);

				}

			}

		}

	}

}
