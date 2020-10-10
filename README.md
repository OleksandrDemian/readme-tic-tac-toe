# :bomb:Readme tic-tac-toe

### :space_invader: Game
This repository simulates a tic-tac-toe game in readme file.

### :video_game: How to play
It plays the same way standard tic-tac-toe does! (it didn't checks the winner. It's a feature thought to make you feel like you're playing on real paper!)

<table>
      <tr>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=1&y=1&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=1&y=1&action=view">
          </a>
        </td>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=2&y=1&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=2&y=1&action=view">
          </a>
        </td>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=3&y=1&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=3&y=1&action=view">
          </a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=1&y=2&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=1&y=2&action=view">
          </a>
        </td>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=2&y=2&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=2&y=2&action=view">
          </a>
        </td>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=3&y=2&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=3&y=2&action=view">
          </a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=1&y=3&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=1&y=3&action=view">
          </a>
        </td>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=2&y=3&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=2&y=3&action=view">
          </a>
        </td>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=3&y=3&action=move">
            <img src="http://infinitysasha.altervista.org/tic-tac-toe/index.php?x=3&y=3&action=view">
          </a>
        </td>
      </tr>
      <tr>
        <td>
          <img src="http://infinitysasha.altervista.org/tic-tac-toe/utils.php?action=currentPlayer">
        </td>
        <td>
          <a href="http://infinitysasha.altervista.org/tic-tac-toe/index.php?action=restart">
            Restart
          </a>
        </td>
        <td>
           --
        </td>
      </tr>
    </table>

### :computer: Tech
This project uses php to manage business logic and produce final board.

Game state is saved in mysql database

### Development
What you need:
- Tomcat (or something other that can run PHP)
- MySql database

#### First step
Import ttt_stat.sql and ttt_board.sql into your database

#### Second step
Copy all .php files into tomcat

#### Third step
Copy readme, change all urls from infinitysasha to your server (or use infinitysasha, but in that case skip previous two steps, only copy readme to your repository).
