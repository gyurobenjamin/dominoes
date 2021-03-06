## About Dominos

Dominoes is a family of games played with rectangular tiles. Each tile is divided into two square ends. Each end is marked with a number (one to six) of spots or is blank. There are 28 tiles, one for each combination of spots and blanks (see image).

#### Task
Write a program which allows two players to play Dominoes against each other:
- The 28 tiles are shuffled face down and form the stock. Each player draws seven tiles.
- Pick a random tile to start the line of play.
- The players alternately extend the line of play with one tile at one of its two ends;
- A tile may only be placed next to another tile, if their respective values on the connecting ends are identical.
- If a player is unable to place a valid tile, they must keep on pulling tiles from the stock until they can.
- The game ends when one player wins by playing their last tile.

Example output:
```
Game starting with first tile: <4:1>
Alice plays <0:4> to connect to tile <4:1> on the board
Board is now: <0:4> <4:1>
Bob plays <0:5> to connect to tile <0:4> on the board
Board is now: <5:0> <0:4> <4:1>
Alice plays <1:1> to connect to tile <1:4> on the board
Board is now: <5:0> <0:4> <4:1> <1:1>
Bob can't play, drawing tile <1:6>
Bob plays <1:6> to connect to tile <1:1> on the board
Board is now: <5:0> <0:4> <4:1> <1:1> <1:6>
Alice plays <6:6> to connect to tile <1:6> on the board
Board is now: <5:0> <0:4> <4:1> <1:1> <1:6> <6:6>
Bob plays <4:6> to connect to tile <6:6> on the board
Board is now: <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4>
Alice plays <5:5> to connect to tile <0:5> on the board
Board is now: <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4>
Bob plays <3:4> to connect to tile <4:6> on the board
Board is now: <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3>
Alice plays <0:3> to connect to tile <3:4> on the board
Board is now: <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0>
Bob can't play, drawing tile <1:5>
Bob plays <1:5> to connect to tile <5:5> on the board
Board is now: <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0>
Alice plays <0:2> to connect to tile <0:3> on the board
Board is now: <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0> <0:2>
Bob plays <2:3> to connect to tile <0:2> on the board
Board is now: <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0> <0:2> <2:3>
Alice plays <0:1> to connect to tile <1:5> on the board
Board is now: <0:1> <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0> <0:2> <2:3>
Player Alice has won!
```
## Setup project locally
### Requirements
- PHP7+
- Composer [https://getcomposer.org/]

Composer needs to generate autoload before run:
```bash
composer dump-autoload
```

## How to use
Simple PHP use
```php
use Dominoes\Game;

$game = new Game();
$game->run();
```

Custom PHP use
```php
use Dominoes\Game;

$game = new Game([
    "numOfPlayers" => 4,
    "names" => ["Alice", "Bob", "Kaia", "Rosa"]
]);
```

## How to run
Running the app with a single command in the root folder (See "***Set up project locally***" part first):
```bash
./run
```
Running in docker [https://docs.docker.com/get-docker/]:
```bash
# Build the container locally
docker build -t dominoes .

# Run the docker container
docker run dominoes
```

## Run test
Locally run from the terminal (docker already includes):
```bash
./vendor/bin/phpunit tests
```

## Structure

    .
    ├── Dockerfile                  # Config file for docker
    ├── README.md                   # Information about the project
    ├── composer.json               # Config file for composer
    ├── run                         # Unix script to run the app with PHP
    ├── src                         # Source of the game
    │   ├── Printer                 # Table of contents
    │   ├── Resources               # Entities, objects
    │   │   ├── Line.php            # Represents a list of tiles alias Board in the game
    │   │   ├── Play.php            # Single play in the game from the shuffle to the end
    │   │   ├── Player.php          # Represents a player
    │   │   ├── PlayersGroup.php    # Set of all current players
    │   │   ├── Stock.php           # List of tiles
    │   │   └── Tile.php            # Single tile with two ends
    │   ├── Config.php              # Parsing the config
    │   └── Game.php                # Game wrapper
    └── vendor                      # Vendor folder 

## TODO
- Write tests
- Check dependencies between object in Resources, might be good to decouple them with dependency inversion
