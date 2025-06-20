# Smart Parking System (IoT-based)

An IoT-enabled Smart Parking System that helps optimize urban parking space through automation. The project uses Arduino, NodeMCU, and IR sensors to detect vehicle movement, while a PHP-MySQL backend and Android app manage slot availability, bookings, and real-time updates.

## 🚗 Features

- User Registration & Login
- View available parking slots
- Book or Cancel a slot
- Park/Retrieve car using app
- Real-time slot status updates via IR sensor
- Admin panel to manage users and slots
- Android application integration
- Arduino-based hardware prototype

## 🛠️ Technologies Used

### Hardware:
- Arduino Uno
- NodeMCU (ESP8266)
- IR Sensors
- Stepper Motor
- Wi-Fi module

### Software:
- PHP, HTML, CSS, JS (Frontend)
- MySQL (Database)
- XAMPP (Local Server)
- Android Studio (Java/Kotlin)
- Arduino IDE

## 📸 Screenshots

![Login Page](screenshots/login.png)
![Slot Booking](screenshots/slot-booking.png)
![Circuit Diagram](screenshots/circuit.png)


## ⚙️ Setup Instructions

1. Install XAMPP and start Apache & MySQL.
2. Import `smart_parking.sql` into phpMyAdmin.
3. Place `backend/` files in `htdocs/` directory.
4. Open the Android project in Android Studio.
5. Upload code to Arduino and NodeMCU via Arduino IDE.
6. Connect hardware components as per the circuit diagram.

## 🧠 Authors

- Kaushik Shigavan  
- Harshad Raurale  
- Shubham Modi  
- Priyanshu Worlikar  

## 🎓 Academic Info

Final year Diploma Project | Vidyalankar Polytechnic | Dept. of Computer Engineering (2021–22)

## 📜 License

This project is licensed under the MIT License.
