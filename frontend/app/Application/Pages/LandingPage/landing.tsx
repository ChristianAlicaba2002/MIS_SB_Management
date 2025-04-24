import React from 'react';


function LandingPage() {
  return (
    <div className="text-white min-h-screen font-raleway overflow-x-hidden">
      <div className="flex items-center justify-start p-6">
        <div className="flex items-center">
          <img src="/img/oop_logo.png" alt="Logo" className="w-20 h-20 mr-4" />
          <span className='text-5xl lg:text-6xl font-extrabold font-["Playfair_Display"] bg-gradient-to-r from-[#F77062] to-[#FE5196] text-transparent bg-clip-text drop-shadow-pink-500'>
            MIS&SB
          </span>
        </div>
      </div>

      <section className="flex flex-col lg:flex-row items-center justify-between py-24">
        <div className="w-full lg:w-1/2 space-y-8 text-center lg:text-center">
          <div className="text-6xl lg:text-7xl font-extrabold bg-gradient-to-r from-[#F77062] to-[#FE5196] text-transparent bg-clip-text drop-shadow-pink-500">
            Frosty Frenzy & Bliss!
          </div>
          <h2 className="text-lg text-gray-500 leading-relaxed font-serif">
            Legend whispers of a taste that rewrites happiness. They say it's the sprinkle that changes everything.
          </h2>
          <a
            href="/Application/Pages/MainPage"
            className="inline-block px-8 py-4 rounded-full text-white font-semibold text-lg 
                      bg-gradient-to-br from-[#F77062] to-[#FE5196] 
                      shadow-pink-400 shadow-md transition-all duration-300 
                      hover:from-[#FE5196] hover:to-[#F77062] 
                      hover:shadow-pink-300 hover:shadow-xl hover:scale-105"
          >
            View More
          </a>
        </div>
        <div className="w-full h-90 lg:w-1/2 mt-12 lg:mt-0 flex justify-center lg:justify-end">
          <img
            src="/img/Strawberry.png"
            alt="Strawberry"
            className="w-4/5 lg:w-3/5 h-auto object-contain"
          />
        </div>
      </section>
    </div>
  );
}

export default LandingPage;