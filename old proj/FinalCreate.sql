-- cs325_final proj
-- Guanyu, Kyong, Alex, Puran

drop table Skill cascade constraints;
drop table Completed_By cascade constraints;
drop table Needs_To_Complete cascade constraints;
drop table Game_Char cascade constraints;
drop table Weapon cascade constraints;
drop table Profession cascade constraints;
drop table Task cascade constraints;
drop table Game_User cascade constraints;

create table Game_User (
    id char(8) primary key,
    pw varchar(16) not null check(LENGTH(pw) >= 8)
);

create table Task (
    name varchar(16) primary key,
    description varchar(64) unique
);

create table Profession (
    name varchar(12) primary key
);

create table Weapon (
    name varchar(32) primary key,
    damage int not null check(damage > 0),
    lvl_req int not null check(lvl_req >= 0),
    accuracy float not null check(accuracy > 0 and accuracy <= 1),
    profession varchar(12) not null,

    foreign key (profession) references Profession
);

create table Game_Char (
    name varchar(32) unique not null,
    user_id char(8) not null,
    hp int not null check(hp >= 0 and hp <= 100),
    mp int not null check(mp >= 0 and mp <= 100),
    exp int not null check(exp >= 0),
    lvl int not null check(lvl > 0 and lvl <= 50),
    profession varchar(12) not null,
    weapon varchar(32) not null,

    primary key (name, user_id),
    foreign key (user_id) references Game_User,
    foreign key (profession) references Profession,
    foreign key (weapon) references Weapon
);

create table Needs_To_Complete (
    user_id char(8),
    char_name varchar(32),
    task_name varchar(16),
    deadline timestamp,

    primary key (user_id, char_name, task_name),
    foreign key (user_id) references Game_User,
    foreign key (char_name, user_id) references Game_Char,
    foreign key (task_name) references Task
);

create table Completed_By (
    user_id char(8),
    char_name varchar(32),
    task_name varchar(16),

    primary key (user_id, char_name, task_name),
    foreign key (user_id) references Game_User,
    foreign key (char_name, user_id) references Game_Char,
    foreign key (task_name) references Task
);

create table Skill (
    name varchar(32) primary key,
    damage int not null check(damage >= 0),
    mana_cost int not null check(mana_cost >= 0 and mana_cost <= 100),
    type varchar(6) not null check(type = 'Attack' or type = 'Heal'),
    lvl_req int not null check(lvl_req >= 0),
    profession varchar(12) not null,

    foreign key (profession) references Profession
);