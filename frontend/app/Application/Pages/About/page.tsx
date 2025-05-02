import React from 'react';
import Sidebar from "@/app/Application/Components/Sidebar";

const About = () => {
  return (
    <>
      <aside>
        <Sidebar />
      </aside>

      <div className="flex flex-col items-center p-8 text-white min-h-screen bg-gradient-to-br from-[#FFF0F3] to-[#FFE5EC]">
        <div className="text-center mb-10">
          <img
            src="/img/oop_logo.png"
            alt="Mary's Ice Scramble & Snack Bites Logo"
            className="h-30 w-30 object-contain mx-auto mb-4 "
          />
          <h1 className="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-[#F77A75] to-[#FE6690]">
            Mary's Ice Scramble & Snack Bites
          </h1>
          <p className="mt-2 text-lg text-[#D65778]">Affordable, cold desserts to beat the hot weather, starting from 45 pesos!</p>
        </div>

        <div className="flex flex-col md:flex-row justify-center items-start gap-6 w-full max-w-7xl">
        <div className="flex-1 bg-white rounded-[2rem] p-8 shadow-lg shadow-pink-200 flex flex-col items-center">
          <img src='/img/target.png' alt='Mission' className="h-14 w-14" />
          <h2 className="text-3xl font-bold text-[#D64560] mb-4 ">Mission</h2>
          <div className="text-[#A83256]">
            <p className="text-lg leading-relaxed text-center text-justify">
              To provide delicious and affordable cold desserts that bring joy to people of all ages, starting at just 45 pesos. Our ice scramble and snack bites make every summer day refreshing and fun!
            </p>
          </div>
        </div>

        <div className="flex-1 bg-white rounded-[2rem] p-8 shadow-lg shadow-pink-200 flex flex-col items-center">
          <img src='/img/light-bulb.png' alt='Vision' className="h-14 w-14" />
          <h2 className="text-3xl font-bold text-[#D64560] mb-4 ">Vision</h2>
          <div className="text-[#A83256]">
            <p className="text-lg leading-relaxed text-center text-justify">
              To be the go-to spot for affordable cold desserts in the city, creating happy memories for every customer and serving the best treats to cool down in the heat.
            </p>
          </div>
        </div>
      </div>


      </div>
    </>
  );
};

export default About;
