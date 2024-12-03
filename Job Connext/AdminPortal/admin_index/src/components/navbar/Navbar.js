import React from 'react';
import './Navbar.css';
import logo from './NavImg/logo.png'
import adminProfile from './NavImg/adminProfile.png'
import Notification from './NavImg/Notification.png'



class Navbar extends React.Component {
    render() {
        return (
            <nav className="NavbarItems">
                {/* Logo and Name */}
                <div className="navbar-left">
                    <img src={logo} alt="Logo" className="navbar-logo" />
                    <h1 className="navbar-name">
                        JobCon<span className="navbar-name-next">next</span>
                    </h1>
                </div>

                {/* Search Bar */}
                <div className="navbar-center">
                    <input
                        type="text"
                        className="search-input"
                        placeholder="Search..."
                    />
                    <button className="search-button">Search</button>
                </div>
                

                {/* Profile Icon */}
                <div className="navbar-right">
                    <img
                        src={Notification}
                        className="Notification-icon"
                    />
                    <img
                        src={adminProfile}
                        alt="Profile Icon"
                        className="profile-icon"
                    />
                </div>
            </nav>
        );
    }
}

export default Navbar;
