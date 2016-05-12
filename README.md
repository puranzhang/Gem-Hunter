# Game Database

We ([Puran](https://github.com/puranzhang), [Guanyu](https://github.com/RobinChenRichmond), Kyong and Alex) are designing a database for an arbitrary game (specifically RPG). The database is meant to be maintained/updated by the administrator of the game.There are some restrictions to the database that would make the design/implementation of the database simpler. For example, one user is limited to have just one character in the game.  Also, we will assume that each character will precisely have one weapon, instead of having an armor as well.

In the front end, we will implement random fights between two users when they randomly encounter each other. Like in [Pokemon](http://www.pokemon.com/us/), the two users will take turns to use their skills on each other. When one user dies, winner will gain some amount of exp based on his level relative to the loser’s level, while the loser will be revived a few seconds later with his hp/mp fully restored. The winner will not regain his hp/mp after the fight. 


67890