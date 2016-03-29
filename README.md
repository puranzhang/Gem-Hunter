# Final Project – Part 2
Puran, Robin, Kyong, Alex 

We are designing a database for an arbitrary game (specifically RPG). The database is meant to be maintained/updated by the administrator of the game.There are some restrictions to the database that would make the design/implementation of the database simpler. For example, one user is limited to have just one character in the game.  Also, we will assume that each character will have only one (or no) weapon, instead of having an armor as well. 
The 6 tables focus on describing each user/character, ignoring the other parts of a game, such as creeps, maps, etc. Thus, there will be 6 tables in the database: User, Character, Task, Profession, Weapon, and Skill. The ‘lvl_requirement’attribute for Weapon table is to ensure that the character that is carrying the weapon is of level greater than or equal to the required level. For more specifics about the tables, please refer to the ER diagram.
