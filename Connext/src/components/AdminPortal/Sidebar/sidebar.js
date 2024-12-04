import React from 'react'
import './sidebar.css';
import { SidebarMenuItems } from './sideBarMenuItems';


function sidebar() {
  return (
    
    <div className='SideBar-container'>
        
        
        <ul className='SidebarList'>
            {SidebarMenuItems.map((val, key)=>{
            return (<li  key={key} className='sidebarRow'
                    onClick={()=> window.location.pathname = val.link} >
                    {" "}
                    <div><img src={val.icon} className="SideIcon" alt={val.title} /></div>{" "}
                    <div>
                        {val.title}
                    </div>
                </li>)
            })}
        </ul>
        <button className="Logout-button">Logout</button>
    </div>
  )
}

export default sidebar
