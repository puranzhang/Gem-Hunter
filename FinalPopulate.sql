-- cs325_final proj
-- Guanyu, Kyong, Alex, Puran

insert into Game_User 
    VALUES ('123456789012', 'Abc123456!', 'Robin Chen', 'guanyu.chen@richmond.edu');

insert into Profession 
    VALUES ('Archer');

insert into Weapon 
    VALUES ('Bow', 18, 0, 0.4, 'Archer');

insert into Game_Char 
    VALUES ('IDK', '123456789012', 100, 100, 0, 1, 'Archer', 'Bow');

insert into Task 
    VALUES ('First Blood', 'Win one battle.');

insert into Needs_To_Complete
    VALUES ('123456789012', 'IDK', 'First Blood', null);

insert into Completed_By
    VALUES ('123456789012', 'IDK', 'First Blood');

insert into Skill 
    VALUES ('Super large arrow', 36, 5, 'Attack', 0, 'Archer');