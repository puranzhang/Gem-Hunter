
insert into Profession 
    VALUES ('Archer');
insert into Profession 
    VALUES ('Thief');
insert into Profession 
    VALUES ('Fighter');
insert into Profession 
    VALUES ('Magician');


insert into Weapon 
    VALUES ('Bow', 26, 1, 0.25, 'Archer','001');
insert into Weapon 
    VALUES ('Iron Bow', 28, 10, 0.4, 'Archer','002');
insert into Weapon 
    VALUES ('Gold Bow', 32, 20, 0.55, 'Archer','003');
insert into Weapon 
    VALUES ('Diamond Bow', 36, 30, 0.7, 'Archer','004');
insert into Weapon 
    VALUES ('Cubid', 50, 40, 0.5, 'Archer','005');
insert into Weapon 
    VALUES ('Apolo', 40, 50, 0.95, 'Archer','006');

insert into Weapon 
    VALUES ('Dagger', 23, 1, 0.6, 'Thief','007');
insert into Weapon 
    VALUES ('Silver Dagger', 23, 10, 0.9, 'Thief','008');
insert into Weapon 
    VALUES ('Chain Attacker', 28, 20, 0.75, 'Thief','009');
insert into Weapon 
    VALUES ('Scimitar', 32, 30, 0.8, 'Thief','010');
insert into Weapon 
    VALUES ('Pistol', 34, 40, 0.9, 'Thief','011');
insert into Weapon 
    VALUES ('Incinerator', 37, 50, 0.99, 'Thief','012');

insert into Weapon 
    VALUES ('Handguard', 28, 1, 0.25, 'Fighter','013');
insert into Weapon 
    VALUES ('Iron Sword', 33, 10, 0.25, 'Fighter','014');
insert into Weapon 
    VALUES ('Great Sword', 45, 20, 0.25, 'Fighter','015');
insert into Weapon 
    VALUES ('Double Swords', 46, 30, 0.33, 'Fighter','016');
insert into Weapon 
    VALUES ('Excalibur', 50, 40, 0.44, 'Fighter','017');
insert into Weapon 
    VALUES ('Nothing', 70, 50, 0.44, 'Fighter','018');

insert into Weapon 
    VALUES ('Wand', 21, 1, 1, 'Magician','019');
insert into Weapon 
    VALUES ('Iron Wand', 25, 10, 0.6, 'Magician','020');
insert into Weapon 
    VALUES ('Wand and Sword', 30, 20, 0.6, 'Magician','021');
insert into Weapon 
    VALUES ('War Staff', 35, 30, 0.8, 'Magician','022');
insert into Weapon 
    VALUES ('Ether Wand', 32, 40, 0.9, 'Magician','023');
insert into Weapon 
    VALUES ('The Grail', 35, 50, 1, 'Magician','024');

insert into Armor 
    VALUES ('Basic Armor', 10, 1, null, '101');
insert into Armor 
    VALUES ('Archer Advanced Armor', 15, 1, 'Archer', '102');


insert into Game_User 
    VALUES ('11111111', '11111111');
insert into Game_Char 
    VALUES ('Guanyu', '11111111', 100, 100, 100, 100, 5, 0, 1, 'Magician', 'Wand', 'Basic Armor');
insert into Item 
    VALUES ('Guanyu', '019', 1, 'W');
insert into Item 
    VALUES ('Guanyu', '101', 1, 'A');

insert into Game_User 
    VALUES ('22222222', '22222222');
insert into Game_Char 
    VALUES ('Puran', '22222222', 100, 100, 100, 100, 5, 0, 9, 'Magician', 'Wand', 'Basic Armor');
insert into Item 
    VALUES ('Puran', '019', 1, 'W');
insert into Item 
    VALUES ('Puran', '101', 1, 'A');

insert into Game_User 
    VALUES ('33333333', '33333333');
insert into Game_Char 
    VALUES ('Kyong', '33333333', 100, 100, 100, 100, 5, 0, 40, 'Fighter', 'Excalibur', 'Basic Armor');
insert into Item 
    VALUES ('Kyong', '017', 1, 'W');
insert into Item 
    VALUES ('Kyong', '101', 1, 'A');

insert into Game_User 
    VALUES ('44444444', '44444444');
insert into Game_Char 
    VALUES ('Alex', '44444444', 100, 100, 100, 100, 5, 0, 50, 'Archer', 'Apolo', 'Basic Armor');
insert into Item 
    VALUES ('Alex', '001', 1, 'W');
insert into Item 
    VALUES ('Alex', '002', 1, 'W');
insert into Item 
    VALUES ('Alex', '003', 1, 'W');
insert into Item 
    VALUES ('Alex', '004', 1, 'W');
insert into Item 
    VALUES ('Alex', '005', 1, 'W');
insert into Item 
    VALUES ('Alex', '006', 1, 'W');
insert into Item 
    VALUES ('Alex', '101', 1, 'A');
insert into Item 
    VALUES ('Alex', '102', 1, 'A');


insert into Game_User 
    VALUES ('00000000', '00000000');
insert into Game_Char 
    VALUES ('NPC Fighter lv1', '00000000', 100, 100, 100, 100, 5, 0, 1, 'Fighter', 'Handguard', 'Basic Armor');

insert into Game_User 
    VALUES ('00000001', '00000000');
insert into Game_Char 
    VALUES ('NPC Thief lv1', '00000001', 100, 100, 100, 100, 5, 0, 1, 'Thief', 'Dagger', 'Basic Armor');

insert into Game_User 
    VALUES ('00000005', '00000000');
insert into Game_Char 
    VALUES ('NPC Magician 5', '00000005', 100, 100, 100, 100, 5, 0, 5, 'Magician', 'Wand', 'Basic Armor');

insert into Game_User 
    VALUES ('00000006', '00000000');
insert into Game_Char 
    VALUES ('NPC Archer 5', '00000006', 100, 100, 100, 100, 5, 0, 5, 'Archer', 'Bow', 'Basic Armor');

insert into Game_User 
    VALUES ('00000010', '00000000');
insert into Game_Char 
    VALUES ('NPC Fighter 10', '00000010', 100, 100, 100, 100, 5, 0, 10, 'Fighter', 'Iron Sword', 'Basic Armor');

insert into Game_User 
    VALUES ('00000011', '00000000');
insert into Game_Char 
    VALUES ('NPC Magician 10', '00000011', 100, 100, 100, 100, 5, 0, 10, 'Magician', 'Iron Wand', 'Basic Armor');

insert into Game_User 
    VALUES ('00000015', '00000000');
insert into Game_Char 
    VALUES ('NPC Thief 15', '00000015', 100, 100, 100, 100, 5, 0, 15, 'Thief', 'Silver Dagger', 'Basic Armor');

insert into Game_User 
    VALUES ('00000016', '00000000');
insert into Game_Char 
    VALUES ('NPC Archer 15', '00000016', 100, 100, 100, 100, 5, 0, 15, 'Archer', 'Iron Bow', 'Basic Armor');

insert into Game_User 
    VALUES ('00000020', '00000000');
insert into Game_Char 
    VALUES ('NPC Magician 20', '00000020', 100, 100, 100, 100, 5, 0, 20, 'Magician', 'Wand and Sword', 'Basic Armor');

insert into Game_User 
    VALUES ('00000021', '00000000');
insert into Game_Char 
    VALUES ('NPC Archer 20', '00000021', 100, 100, 100, 100, 5, 0, 20, 'Archer', 'Gold Bow', 'Basic Armor');

insert into Game_User 
    VALUES ('00000025', '00000000');
insert into Game_Char 
    VALUES ('NPC Fighter 25', '00000025', 100, 100, 100, 100, 5, 0, 25, 'Fighter', 'Great Sword', 'Basic Armor');

insert into Game_User 
    VALUES ('00000026', '00000000');
insert into Game_Char 
    VALUES ('NPC Thief 25', '00000026', 100, 100, 100, 100, 5, 0, 25, 'Thief', 'Chain Attacker', 'Basic Armor');

insert into Game_User 
    VALUES ('00000030', '00000000');
insert into Game_Char 
    VALUES ('NPC Fighter 30', '00000030', 100, 100, 100, 100, 5, 0, 30, 'Fighter', 'Double Swords', 'Basic Armor');

insert into Game_User 
    VALUES ('00000031', '00000000');
insert into Game_Char 
    VALUES ('NPC Magician 30', '00000031', 100, 100, 100, 100, 5, 0, 30, 'Magician', 'War Staff', 'Basic Armor');

insert into Game_User 
    VALUES ('00000035', '00000000');
insert into Game_Char 
    VALUES ('NPC Archer 35', '00000035', 100, 100, 100, 100, 5, 0, 35, 'Archer', 'Diamond Bow', 'Basic Armor');

insert into Game_User 
    VALUES ('00000036', '00000000');
insert into Game_Char 
    VALUES ('NPC Thief 35', '00000036', 100, 100, 100, 100, 5, 0, 35, 'Thief', 'Scimitar', 'Basic Armor');

insert into Game_User 
    VALUES ('00000040', '00000000');
insert into Game_Char 
    VALUES ('NPC Fighter 40', '00000040', 100, 100, 100, 100, 5, 0, 40, 'Fighter', 'Excalibur', 'Basic Armor');

insert into Game_User 
    VALUES ('00000041', '00000000');
insert into Game_Char 
    VALUES ('NPC Thief 40', '00000041', 100, 100, 100, 100, 5, 0, 40, 'Thief', 'Pistol', 'Basic Armor');

insert into Game_User 
    VALUES ('00000045', '00000000');
insert into Game_Char 
    VALUES ('NPC Magician 45', '00000045', 100, 100, 100, 100, 5, 0, 45, 'Magician', 'Ether Wand', 'Basic Armor');

insert into Game_User 
    VALUES ('00000046', '00000000');
insert into Game_Char 
    VALUES ('NPC Archer 45', '00000046', 100, 100, 100, 100, 5, 0, 45, 'Archer', 'Cubid', 'Basic Armor');

insert into Game_User 
    VALUES ('00000050', '00000000');
insert into Game_Char 
    VALUES ('Expert Fighter', '00000050', 100, 100, 100, 100, 5, 0, 50, 'Fighter', 'Nothing', 'Basic Armor');

insert into Game_User 
    VALUES ('00000051', '00000000');
insert into Game_Char 
    VALUES ('Expert Magician', '00000051', 100, 100, 100, 100, 5, 0, 50, 'Magician', 'The Grail', 'Basic Armor');



insert into Task 
    VALUES ('First Blood', 'Win one battle.');

insert into Needs_To_Complete
    VALUES ('11111111', 'Guanyu', 'First Blood', null);

insert into Completed_By
    VALUES ('11111111', 'Guanyu', 'First Blood');


insert into Skill 
    VALUES ('Shoot arrow', 14, 0, 'Attack', 1, 'Archer');
insert into Skill 
    VALUES ('Fast Shoot', 18, 6, 'Attack', 1, 'Archer');
insert into Skill 
    VALUES ('Penetrating Arrow', 25, 18, 'Attack', 10, 'Archer');
insert into Skill 
    VALUES ('Gold Arrow', 22, 8, 'Attack', 20, 'Archer');
insert into Skill 
    VALUES ('Scattering Shoot', 37, 27, 'Attack', 30, 'Archer');
insert into Skill 
    VALUES ('Fast Shoot II', 23, 5, 'Attack', 35, 'Archer');
insert into Skill 
    VALUES ('Rain of Arrows', 45, 50, 'Attack', 40, 'Archer');
insert into Skill 
    VALUES ('Nuclear Arrow Explosion', 60, 100, 'Attack', 45, 'Archer');
insert into Skill 
    VALUES ('Advanced Attack', 25, 0, 'Attack', 50, 'Archer');


insert into Skill 
    VALUES ('Basic Attack', 12, 0, 'Attack', 1, 'Thief');
insert into Skill 
    VALUES ('Pierce', 16, 1, 'Attack', 1, 'Thief');
insert into Skill 
    VALUES ('Pierce II', 18, 3, 'Attack', 15, 'Thief');
insert into Skill 
    VALUES ('Jump and Slash', 22, 15, 'Attack', 30, 'Thief');
insert into Skill 
    VALUES ('Fast Bullet', 30, 15, 'Attack', 40, 'Thief');
insert into Skill 
    VALUES ('Magic Bullet', 50, 35, 'Attack', 45, 'Thief');
insert into Skill 
    VALUES ('Burning Fury', 35, 10, 'Attack', 50, 'Thief');

insert into Skill 
    VALUES ('Punch', 15, 0, 'Attack', 1, 'Fighter');
insert into Skill 
    VALUES ('Consecutively Punch', 20, 5, 'Attack', 5, 'Fighter');
insert into Skill 
    VALUES ('Shield Bash', 30, 10, 'Attack', 20, 'Fighter');
insert into Skill 
    VALUES ('Double Slash', 55, 20, 'Attack', 30, 'Fighter');
insert into Skill 
    VALUES ('Death Cleave', 110, 60, 'Attack', 40, 'Fighter');
insert into Skill 
    VALUES ('Force of Nature', 50, 30, 'Heal', 50, 'Fighter');
insert into Skill 
    VALUES ('Shout', 35, 1, 'Attack', 50, 'Fighter');

insert into Skill 
    VALUES ('Meditation', 10, 0, 'Attack', 1, 'Magician');
insert into Skill 
    VALUES ('Fire Ball', 13, 4, 'Attack', 1, 'Magician');
insert into Skill 
    VALUES ('Lightning', 16, 10, 'Attack', 1, 'Magician');
insert into Skill 
    VALUES ('Chain Lightning', 22, 18, 'Attack', 10, 'Magician');
insert into Skill 
    VALUES ('Heal', 25, 33, 'Heal', 15, 'Magician');
insert into Skill 
    VALUES ('Have to use Sword', 50, 55, 'Attack', 20, 'Magician');
insert into Skill 
    VALUES ('Staff Strike', 24, 10, 'Attack', 30, 'Magician');
insert into Skill 
    VALUES ('Summon Monsters', 35, 32, 'Attack', 35, 'Magician');
insert into Skill 
    VALUES ('Ether Attack', 30, 9, 'Attack', 40, 'Magician');
insert into Skill 
    VALUES ('Healing Mantra', 40, 20, 'Attack', 45, 'Magician');
insert into Skill 
    VALUES ('Typhoon', 76, 40, 'Attack', 50, 'Magician');