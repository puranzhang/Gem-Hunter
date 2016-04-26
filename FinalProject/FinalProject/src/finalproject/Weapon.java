/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package finalproject;

/**
 *
 * @author kl4jf
 */
public class Weapon {
    private String myName;
    private int myDamage;
    private double myAccuracy;
    
    public Weapon(String name, int damage, double accuracy) {
        myName = name;
        myDamage = damage;
        myAccuracy = accuracy;
    }
    
    public int getDamage() {
        return myDamage;
    }
    
    public double getAccuracy() {
        return myAccuracy;
    }
    
    public String getName() {
        return myName;
    }
    
    public void setName(String updateName) {
        myName = updateName;
    }
    
    public void setDamage(int updateDamage) {
        myDamage = updateDamage;
    }
    
    public void setAccuracy(int updateAccuracy) {
        myAccuracy = updateAccuracy;
    }
}
