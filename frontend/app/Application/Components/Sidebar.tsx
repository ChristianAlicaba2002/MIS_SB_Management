'use client';
import Link from 'next/link';
import Image from 'next/image';
import { useState } from 'react';

const navItems = [
  { href: '/Application/Pages/MainPage', src: '/img/home.png', alt: 'Home', label: 'HOME' },
  { href: '/Application/Pages/Menu', src: '/img/menu.png', alt: 'Menu', label: 'MENU' },
  { href: '/Application/Pages/About', src: '/img/about.png', alt: 'About Us', label: 'ABOUT US' },
  { href: '/Application/Pages/Contact', src: '/img/contact.png', alt: 'Contact Us', label: 'CONTACT' },
];

const Sidebar = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [isHovered, setIsHovered] = useState(false);

  return (
    <>
      <button
        onClick={() => setIsMenuOpen(true)}
        className="md:hidden fixed top-4 left-4 z-50 bg-white/80 backdrop-blur-md rounded-md p-2 shadow-md"
      >
        <Image src="/img/burger-menu.png" alt="Menu" width={30} height={30} />
      </button>

      <aside
        className={`hidden md:flex fixed top-0 left-0 h-full bg-white text-pink-600 shadow-[0_4px_30px_rgba(255,192,203,0.6)] z-50 rounded-r-2xl transition-all duration-500 ease-in-out
        ${isHovered ? 'w-64 px-4' : 'w-20 px-2'}`}
        onMouseEnter={() => setIsHovered(true)}
        onMouseLeave={() => setIsHovered(false)}
      >
        <div className="w-full flex flex-col items-center transition-all duration-500 ease-in-out">
          <div className="mt-6 mb-4 flex justify-center items-center w-full">
            <Image
              src="/img/oop_logo.png"
              alt="Logo"
              width={isHovered ? 100 : 120}
              height={isHovered ? 100 : 120}
              className="transition-all duration-500 ease-in-out"
            />
          </div>

          <div className={`w-full border-t border-pink-300 border-opacity-30 my-4 transition-opacity duration-500 ${isHovered ? 'opacity-100' : 'opacity-0'}`} />

          <nav className="flex-1 w-full">
            <ul className="space-y-6 flex flex-col items-center w-full">
              {navItems.map((item, index) => (
                <li key={index} className="w-full flex justify-center">
                  <Link
                    href={item.href}
                    className="group flex flex-col items-center my-2 justify-center transition-all duration-300"
                  >
                    <div className="transition-all duration-300 group-hover:bg-white group-hover:shadow-md group-hover:rounded-full p-2">
                      <Image
                        src={item.src}
                        alt={item.alt}
                        width={30}
                        height={30}
                        className="transition-transform duration-300 group-hover:scale-110"
                      />
                    </div>
                    <span
                      className={`text-sm font-medium mt-2 transition-all duration-300 transform ${
                        isHovered ? 'opacity-100 scale-100' : 'opacity-0 scale-75'
                      }`}
                    >
                      {item.label}
                    </span>
                  </Link>
                </li>
              ))}
            </ul>
          </nav>

          <div className={`w-full border-t border-pink-300 border-opacity-30 my-4 transition-opacity duration-500 ${isHovered ? 'opacity-100' : 'opacity-0'}`} />

          <Link
            href="/"
            className="group mb-6 flex flex-col items-center transition-all duration-300"
          >
            <div className="transition-all duration-300 group-hover:bg-white group-hover:shadow-md group-hover:rounded-full p-2">
              <Image src="/img/back.png" alt="Back" width={30} height={30} className="transition-transform duration-300 group-hover:scale-110" />
            </div>
            <span
              className={`text-sm font-medium mt-2 transition-all duration-300 transform ${
                isHovered ? 'opacity-100 scale-100' : 'opacity-0 scale-75'
              }`}
            >
              Back
            </span>
          </Link>
        </div>
      </aside>

      {isMenuOpen && (
        <aside className="md:hidden fixed top-0 left-0 h-full w-64 bg-white z-50 shadow-[0_4px_30px_rgba(255,192,203,0.6)] rounded-r-2xl flex flex-col items-start px-4 py-6 space-y-4 transition-all duration-500 ease-in-out">
          <button
            onClick={() => setIsMenuOpen(false)}
            className="absolute top-4 right-4 bg-white/80 backdrop-blur-md rounded-md p-2 shadow-md z-50"
          >
            <Image src="/img/back.png" alt="Close" width={24} height={24} />
          </button>

          <div className="w-full flex justify-center mt-6">
            <Image src="/img/oop_logo.png" alt="Logo" width={90} height={90} />
          </div>

          <hr className="border-pink-300 border-opacity-30 w-full my-4" />

          <nav className="flex-1 w-full">
            <ul className="my-4 space-y-4 flex flex-col w-full">
              {navItems.map((item, index) => (
                <li key={index}>
                  <Link
                    href={item.href}
                    onClick={() => setIsMenuOpen(false)}
                    className="flex items-center py-3 px-4 w-full rounded-md hover:bg-pink-200 text-pink-500 transition-all duration-300"
                  >
                    <div className="p-2 mr-3 group-hover:bg-white group-hover:rounded-md">
                      <Image src={item.src} alt={item.alt} width={24} height={24} />
                    </div>
                    <span className="text-sm font-medium">{item.label}</span>
                  </Link>
                </li>
              ))}
            </ul>
          </nav>

          <hr className="border-pink-300 border-opacity-30 w-full my-4" />

          <Link
            href="/"
            onClick={() => setIsMenuOpen(false)}
            className="flex items-center px-4 py-3 w-full rounded-md hover:bg-pink-200 text-pink-500 transition-all duration-300"
          >
            <div className="p-2 mr-3 group-hover:bg-white group-hover:rounded-md">
              <Image src="/img/back.png" alt="Back" width={24} height={24} />
            </div>
            <span className="text-sm font-medium">Back</span>
          </Link>
        </aside>
      )}
    </>
  );
};

export default Sidebar;
