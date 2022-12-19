import { FaHome } from 'react-icons/fa';
import { Link } from 'react-router-dom';


const Navbar = () =>{
    return(
        <div className="navbar">
            <div className="logo">
     
            </div>
                <div className="menu">
                    <ul>
                        <li><Link to='/'>Strona Główna</Link></li>
    
                        <li><Link to='/contact'>Kontakt</Link></li>
                    </ul>
                </div>
        </div>
    )
}
export default Navbar