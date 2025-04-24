'use client';

import Link from 'next/link';
import { useState } from 'react';

const Sidebar = () => {
  const [isHovered, setIsHovered] = useState(false);

  const sidebarWidth = isHovered ? 'w-64' : 'w-20';
  const textVisible = isHovered ? 'opacity-100' : 'opacity-0';
  const paddingX = isHovered ? 'px-6' : 'px-3';
  const transitionEffect = 'transition-all duration-500 ease-[cubic-bezier(0.68,-0.55,0.27,1.55)]';

  const navItems = [
    {
      href: '/Application/Pages/MainPage',
      icon: (
        <img
          src="/img/homee.png"
          alt="Home"
          className="h-10 w-10 object-contain"
        />
      ),
      label: 'Home',
    },
    {
      href: '/Application/Pages/Menu',
      icon: (
        <img
          src="/img/scramble.png"
          alt="Menu"
          className="h-13 w-13 object-contain"
        />
      ),
      label: 'Menu',
    },
    {
      href: '/Application/Pages/About',
      icon: (
        <img
          src="/img/aboutt.png"
          alt="About Us"
          className="h-10 w-10 object-contain"
        />
      ),
      label: 'About Us',
    },
    {
      href: '/Application/Pages/Contact',
      icon: (
        <img
          src="/img/contactt.png"
          alt="Contact Us"
          className="h-13 w-13 object-contain"
        />
      ),
      label: 'Contact Us',
    },
  ];

  return (
    <aside
      className={`fixed top-0 left-0 h-full ${sidebarWidth} ${paddingX} \
        bg-gradient-to-br from-[#F77062] to-[#FE5196] shadow-2xl z-50 \
        flex flex-col items-center text-white ${transitionEffect} \
        rounded-r-2xl overflow-hidden`}
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
    >
      <div className="my-6">
        <img
          src="/img/oop_logo.png"
          alt="Logo"
          className="h-30 w-30 object-contain bg-white rounded-full p-1"
        />
      </div>

      <hr className={` border-white border-opacity-30 my-4 w-full ${isHovered ? 'block' : 'hidden'}`} />

      <nav className="flex-1 w-full">
        <ul className="space-y-5 flex flex-col items-center">
          {navItems.map((item, index) => (
            <li key={index} className="w-full">
              <Link
                href={item.href}
                className="group flex flex-col items-center transition-all duration-300 ease-in-out"
              >
                <span className="p-3 rounded-full transition-transform duration-300 ease-[cubic-bezier(0.68,-0.55,0.27,1.55)] group-hover:bg-gradient-to-br group-hover:from-[#FF8A72] group-hover:to-[#FE6BA0] group-hover:border group-hover:border-white group-hover:scale-125">
                  {item.icon}
                </span>
                <span
                  className={`text-sm font-medium ${textVisible} mt-1 \
                    transition-transform duration-300 ease-[cubic-bezier(0.68,-0.55,0.27,1.55)] group-hover:scale-110`}
                >
                  {item.label}
                </span>
              </Link>
            </li>
          ))}
        </ul>
      </nav>

      <hr className={`border-white border-opacity-30 my-4 w-full ${isHovered ? 'block' : 'hidden'}`} />

      <Link
        href="/"
        className="group mb-6 flex flex-col items-center transition-all duration-300 ease-in-out"
      >
        <span className="p-3 rounded-full transition-transform duration-300 ease-[cubic-bezier(0.68,-0.55,0.27,1.55)] group-hover:bg-gradient-to-br group-hover:from-[#FF8A72] group-hover:to-[#FE6BA0] group-hover:border group-hover:border-white group-hover:scale-125">
          <img
            src="/img/backk.png"
            alt="Back"
            className="h-10 w-10 object-contain"
          />
        </span>
        <span
          className={`text-sm font-medium ${textVisible} mt-1 \
            transition-transform duration-300 ease-[cubic-bezier(0.68,-0.55,0.27,1.55)] group-hover:scale-110`}
        >
          Back
        </span>
      </Link>
    </aside>
  );
};

export default Sidebar;
