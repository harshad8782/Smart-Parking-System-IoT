#include <SoftwareSerial.h>
#include <ArduinoJson.h> 

#define STEPPER_PIN_1 9
#define STEPPER_PIN_2 10
#define STEPPER_PIN_3 11
#define STEPPER_PIN_4 12
int step_number = 0;

SoftwareSerial nodemcu(2,3);
SoftwareSerial mySerial(7,8);

int parking1_slot1_ir_s = 4;
int parking1_slot2_ir_s = 5;
int parking1_slot3_ir_s = 6;
 
/*int parking2_slot1_ir_s = 7;
int parking2_slot2_ir_s = 8;
int parking2_slot3_ir_s = 9;*/
 
String sensor1; 
String sensor2; 
String sensor3; 
/*String sensor4; 
String sensor5; 
String sensor6; */
 
 String slot;

void setup()
{
Serial.begin(115200); 
nodemcu.begin(9600); 
mySerial.begin(9600);
pinMode(parking1_slot1_ir_s, INPUT);
pinMode(parking1_slot2_ir_s, INPUT);
/*pinMode(parking1_slot3_ir_s, INPUT);
 
pinMode(parking2_slot1_ir_s, INPUT);
pinMode(parking2_slot2_ir_s, INPUT);
pinMode(parking2_slot3_ir_s, INPUT);*/
pinMode(STEPPER_PIN_1, OUTPUT);
pinMode(STEPPER_PIN_2, OUTPUT);
pinMode(STEPPER_PIN_3, OUTPUT);
pinMode(STEPPER_PIN_4, OUTPUT);

}

void loop() {
StaticJsonBuffer<1000> jsonBuffer;
JsonObject& data = jsonBuffer.createObject();

p1slot1(); 
p1slot2();
p1slot3();

data["p1"] = sensor1;
data["p2"] = sensor2;
data["p3"] = sensor3;
/*p1slot3(); 
 
p2slot1();
p2slot2();
p2slot3();*/
 
  
  
   data.printTo(nodemcu);

  if(nodemcu.available()>0){
    Serial.println("Connected");
  }

//StaticJsonBuffer<1000> jsonBuffer;
JsonObject& ard_data = jsonBuffer.parseObject(mySerial);
//   
//
Serial.println("Jeson Object Recived");
String a = ard_data["d1"];
Serial.println(a);

slot = a;

   Serial.println(sensor1); 
   //nodemcu.println(data);
   delay(2000); // 2 seconds
   jsonBuffer.clear();
//digitalWrite(parking1_slot1_ir_s, HIGH); 
//digitalWrite(parking1_slot2_ir_s, HIGH); 
/*digitalWrite(parking1_slot3_ir_s, HIGH);
 
digitalWrite(parking2_slot1_ir_s, HIGH);
digitalWrite(parking2_slot2_ir_s, HIGH);
digitalWrite(parking2_slot3_ir_s, HIGH);*/

//stepper Motor
if(slot == "3"){
/*for (int i = 0; i<12000; i++){
  OneStep(false);
  delay(2);
}
delay(1000);*/
for (int i = 0; i<12500; i++){
  OneStep(true);
  delay(2);
}
delay(10000);
for (int i = 0; i<12500; i++){
  OneStep(false);
  delay(2);
}
delay(10000);
slot = "0";
}  

if(slot == "2"){
/*for (int i = 0; i<12000; i++){
  OneStep(false);
  delay(2);
}
delay(1000);*/
for (int i = 0; i<19850; i++){
  OneStep(true);
  delay(2);
}
delay(10000);
for (int i = 0; i<19850; i++){
  OneStep(false);
  delay(2);
}
delay(2000);
slot = "0";
}
  
}
 
//P1slot1 is a user defined function, it has no return type and it doesn not take any argument as the input.  if there is a car infront of the sensor it gives digital logic 0, and if no car then it give digital logic 1, depending on this, then we store p1s1on or p1s1off.  The same mechanism is used for all the other infrared sensors.
 
void p1slot1() // parkng 1 slot1
{
  if( digitalRead(parking1_slot1_ir_s) == LOW) 
  {
  sensor1 = "p1s1on"; // parking1 slot1 
 delay(200); 
  } 
if( digitalRead(parking1_slot1_ir_s) == HIGH)
{
  sensor1 = "p1s1off";  
 delay(200);  
}
 
}
 
 void p1slot2() // parking 1 slot2
{
  if( digitalRead(parking1_slot2_ir_s) == LOW) 
  {
  sensor2 = "p1s2on"; 
  delay(200); 
  }
if( digitalRead(parking1_slot2_ir_s) == HIGH)  
  {
  sensor2 = "p1s2off";  
 delay(200);
  } 
}

void p1slot3() // parking 1 slot3
{
  if( digitalRead(parking1_slot3_ir_s) == LOW) 
  {
  sensor3 = "p1s3on"; 
  delay(200); 
  }
if( digitalRead(parking1_slot3_ir_s) == HIGH)  
  {
  sensor3 = "p1s3off";  
 delay(200);
  } 
}

 void OneStep(bool dir){
    if(dir){
switch(step_number){
  case 0:
  digitalWrite(STEPPER_PIN_1, HIGH);
  digitalWrite(STEPPER_PIN_2, LOW);
  digitalWrite(STEPPER_PIN_3, LOW);
  digitalWrite(STEPPER_PIN_4, LOW);
  break;
  case 1:
  digitalWrite(STEPPER_PIN_1, LOW);
  digitalWrite(STEPPER_PIN_2, HIGH);
  digitalWrite(STEPPER_PIN_3, LOW);
  digitalWrite(STEPPER_PIN_4, LOW);
  break;
  case 2:
  digitalWrite(STEPPER_PIN_1, LOW);
  digitalWrite(STEPPER_PIN_2, LOW);
  digitalWrite(STEPPER_PIN_3, HIGH);
  digitalWrite(STEPPER_PIN_4, LOW);
  break;
  case 3:
  digitalWrite(STEPPER_PIN_1, LOW);
  digitalWrite(STEPPER_PIN_2, LOW);
  digitalWrite(STEPPER_PIN_3, LOW);
  digitalWrite(STEPPER_PIN_4, HIGH);
  break;
} 
  }else{
    switch(step_number){
  case 0:
  digitalWrite(STEPPER_PIN_1, LOW);
  digitalWrite(STEPPER_PIN_2, LOW);
  digitalWrite(STEPPER_PIN_3, LOW);
  digitalWrite(STEPPER_PIN_4, HIGH);
  break;
  case 1:
  digitalWrite(STEPPER_PIN_1, LOW);
  digitalWrite(STEPPER_PIN_2, LOW);
  digitalWrite(STEPPER_PIN_3, HIGH);
  digitalWrite(STEPPER_PIN_4, LOW);
  break;
  case 2:
  digitalWrite(STEPPER_PIN_1, LOW);
  digitalWrite(STEPPER_PIN_2, HIGH);
  digitalWrite(STEPPER_PIN_3, LOW);
  digitalWrite(STEPPER_PIN_4, LOW);
  break;
  case 3:
  digitalWrite(STEPPER_PIN_1, HIGH);
  digitalWrite(STEPPER_PIN_2, LOW);
  digitalWrite(STEPPER_PIN_3, LOW);
  digitalWrite(STEPPER_PIN_4, LOW);
 
  
} 
}
step_number++;
  if(step_number > 3){
    step_number = 0;
    }
}
 
/*void p1slot3() // parking 1 slot3
{
  if( digitalRead(parking1_slot3_ir_s) == LOW) 
  {
  sensor3 = "p1s3on"; 
  delay(200); 
  }
if( digitalRead(parking1_slot3_ir_s) == HIGH)  
  {
  sensor3 = "p1s3off";  
 delay(200);
  } 
}
 
 
// now for parking 2
 
void p2slot1() // parking 1 slot3
{
  if( digitalRead(parking2_slot1_ir_s) == LOW) 
  {
  sensor4 = "p2s1on"; 
  delay(200); 
  }
if( digitalRead(parking2_slot1_ir_s) == HIGH)  
  {
  sensor4 = "p2s1off";  
 delay(200);
  } 
}
 
 
void p2slot2() // parking 1 slot3
{
  if( digitalRead(parking2_slot2_ir_s) == LOW) 
  {
  sensor5 = "p2s2on"; 
  delay(200); 
  }
if( digitalRead(parking2_slot2_ir_s) == HIGH)  
  {
  sensor5 = "p2s2off";  
 delay(200);
  } 
}
 
 
void p2slot3() // parking 1 slot3
{
  if( digitalRead(parking2_slot3_ir_s) == LOW) 
  {
  sensor6 = "p2s3on"; 
  delay(200); 
  }
if( digitalRead(parking2_slot3_ir_s) == HIGH)  
  {
  sensor6 = "p2s3off";  
 delay(200);
  } 
}
}*/
