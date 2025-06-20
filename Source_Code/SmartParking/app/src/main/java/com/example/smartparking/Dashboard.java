package com.example.smartparking;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.fragment.app.Fragment;

import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

import com.google.android.material.appbar.MaterialToolbar;
import com.google.android.material.navigation.NavigationView;

public class Dashboard extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);
        MaterialToolbar toolbar = findViewById(R.id.topAppBar);
        DrawerLayout drawerLayout = findViewById(R.id.drawer_layout);
        NavigationView navigationView = findViewById(R.id.navigation_view);


        ActionBar actionBar = getSupportActionBar();
        actionBar.hide();

        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                drawerLayout.openDrawer(GravityCompat.START);

            }
        });

        getSupportFragmentManager().beginTransaction().replace(R.id.container,new Home()).commit();
        navigationView.setCheckedItem(R.id.nav_home);

        navigationView.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {

            Fragment temp;
            @Override
            public boolean onNavigationItemSelected(@NonNull @org.jetbrains.annotations.NotNull MenuItem item) {

                int id = item.getItemId();
                drawerLayout.closeDrawer(GravityCompat.START);
                switch (id)
                {

                    case R.id.nav_home:
                        temp = new Home();
                        break;
                    case R.id.nav_parking:
                        temp = new Parking();
                        break;
                    case R.id.nav_status:
                        temp = new Status();
                        break;
                    case R.id.nav_cancel:
                        temp = new CancelParking();
                        break;
                    case R.id.nav_profile:
                        temp = new Profile();
                        break;
                    case R.id.nav_logout:
                        temp = new Logout();
                        break;
                    default:
                        return true;

                }
                getSupportFragmentManager().beginTransaction().replace(R.id.container,temp).commit();
                return true;
            }
        });


    }
}