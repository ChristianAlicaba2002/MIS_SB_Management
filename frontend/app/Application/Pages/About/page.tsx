"use client";

import Sidebar from "@/app/Application/Components/Sidebar";

const AboutUsPage = () => {
  return (
    <>
      <Sidebar />
      <div className="ml-20 md:ml-64 p-8 min-h-screen font-['Playfair_Display'] transition-all duration-500 bg-white flex items-center justify-center">
        <div className="p-10 md:p-16 rounded-lg  text-center">
          <h1 className="text-6xl md:text-7xl font-extrabold bg-gradient-to-r from-[#f56b5c] to-[#fe5196] text-transparent bg-clip-text mb-8 animate-bounce">
            Mary`s Ice Scramble & Snack Bites
          </h1>
          <p className="text-xl md:text-2xl text-gray-800 leading-relaxed tracking-wide">
            Where the hots find the cold they`re looking for. Our established
            aims for a refreshing cool down during the heat and food so good
            you`ll come back even if it`s raining heavily. We have a wide range
            of snacks and desserts for the satisfaction of one`s palette and
            taste.
          </p>
        </div>
      </div>
    </>
  );
};

export default AboutUsPage;