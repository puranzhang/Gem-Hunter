/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package finalproject;

/**
 * Represents a skill that character can have.
 * 
 */
public class Skill {
    private String name;
    private int damage; // between 0 and 100 inclusive
        // if type is "Heal", damage represents amount character is healed.
    private int mana_cost; // between 0 and 100 inclusive
    private String type; // "Attack" or "Heal"
    private int lvl_req; // required lvl of character to use this skill
    
    public Skill() {
        
    }
    
    public Skill(String name, int damage, int mana_cost, String type, int lvl_req){
        this.name = name;
        this.damage = damage;
        this.mana_cost = mana_cost;
        this.type = type;
        this.lvl_req = lvl_req;
    };
    
    public String getName(){
        return name;
    }
    
    public void setName(String newName) {
        name = newName;
    }
    
    public int getDamage()  {
        return damage;
    }
    
    public void setDamage(int newDamage) {
        damage = newDamage;
    }
    
    public int getManaCost() {
        return mana_cost;
    }
    
    public void setManaCost(int newMana) {
        mana_cost = newMana;
    }
    
    public String getType() {
        return type;
    }
    
    public void setType(String newType) {
        type = newType;
    }
    
    public int getLvlReq(){
        return lvl_req;
    }
    
    public void setLvlReq(int newLvlReq) {
        lvl_req = newLvlReq;
    }
}


