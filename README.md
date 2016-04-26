# Game Database

We ([Puran](https://github.com/puranzhang), [Guanyu](https://github.com/RobinChenRichmond), Kyong and Alex) are designing a database for an arbitrary game (specifically RPG). The database is meant to be maintained/updated by the administrator of the game.There are some restrictions to the database that would make the design/implementation of the database simpler. For example, one user is limited to have just one character in the game.  Also, we will assume that each character will precisely have one weapon, instead of having an armor as well.

In the front end, we will implement random fights between two users when they randomly encounter each other. Like in [Pokemon](http://www.pokemon.com/us/), the two users will take turns to use their skills on each other. When one user dies, winner will gain some amount of exp based on his level relative to the loser’s level, while the loser will be revived a few seconds later with his hp/mp fully restored. The winner will not regain his hp/mp after the fight. 

The 6 tables focus on describing each user/character, ignoring the other parts of a game, such as creeps, maps, etc. Thus, there will be 6 tables in the database: User, Character, Task, Profession, Weapon, and Skill. 

Description of entities and relationships:
- The entity User has four attributes: the key attribute id stores the unique id number for each user; three other attributes are name, email and password for registration purpose. 
- The weak entity Character has five attributes: a unique name for each character, level, experience, hp and mp as properties for each character. The relationship between User and Character demonstrates that each user can create and then control only one character. 
- The entity Task has three attributes: the key attribute name stores the unique name for each task, description describes the content of the task, and deadline shows when the task is due. The relationship between Character and Task shows that each character can have any number of tasks. In addition, any task can be completed by any number of characters.
- The entity Profession has only a key attribute, name. The relationship between Character and Profession means that each character must have one profession.
- The entity weapon has four attributes: the key attribute name that stores the unique name for each weapon, and other three attributes determine how much damage the weapon can make, the minimum level required for a character to equip the weapon and the accuracy of the weapon. The relationship between Character and weapon means that each weapon may be equipped by multiple characters, and the relationship between Profession and Weapon means that multiple weapons would be allowed by each profession to use.
- The entity Skill has five attributes: the key attribute name stores the unique name for each skill, damage stores the value of effect this skill can make, mana_cost stores the cost of mana of this skill, type stores the effect of the skill, and the Lv_require stores the minimum level required for a character to cast this skill.

