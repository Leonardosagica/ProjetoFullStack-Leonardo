import { useNavigate, useParams } from "react-router-dom";
import { useState, useEffect } from "react";
import api from "../services/api";
import { useStateContext } from "../contexts/ContextProvider";

export default function UserForm() {
    const { id } = useParams();
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);

    const { setNotification } = useStateContext();

    const [user, setUser] = useState({
        name: "",
        email: "",
        password: "",
    });

    useEffect(() => {
        if (id) {
            setLoading(true);
            api.get(`/user/${id}`)
                .then(({ data }) => {
                    setLoading(false);
                    setUser(data);
                })
                .catch(() => {
                    setLoading(false);
                });
        }
    }, [id]);

    const onSubmit = (ev) => {
        ev.preventDefault();
        setLoading(true);
        if (user.id) {
            api.put(`/add_user/${id}`, user)
                .then(() => {
                    setNotification("User updated successfully!");
                    setLoading(false);
                    navigate("/users");
                })
                .catch((err) => {
                    setLoading(false);
                    const response = err.response;
                    if (response && response.status === 422) {
                        setErrors(response.data.errors);
                    }
                });
        } else {
            api.post("/add_user", user)
                .then(() => {
                    setNotification("User created successfully!");
                    setLoading(false);
                    navigate("/users");
                })
                .catch((err) => {
                    if (err.response && err.response.status === 422) {
                        console.log(err.response.data.errors);
                        setErrors(err.response.data.errors);
                    }
                });
        }
    };

    return (
        <>
            {user.id && <h1>Update User:{user.id} </h1>}
            {!user.id && <h1>New User</h1>}
            <div>
                {loading && <div className="text-center"> Loading... </div>}
                {errors && (
                    <div className="alert">
                        {Object.keys(errors).map((key) => (
                            <p key={key}>{errors[key][0]}</p>
                        ))}
                    </div>
                )}
                {!loading && (
                    <form action="" onSubmit={onSubmit}>
                        <input
                            value={user.name}
                            onChange={(ev) =>
                                setUser({ ...user, name: ev.target.value })
                            }
                            placeholder="Name"
                        />
                        <input
                            onChange={(ev) =>
                                setUser({ ...user, email: ev.target.value })
                            }
                            value={user.email}
                            placeholder="Email"
                            type="email"
                        />
                        <input
                            onChange={(ev) =>
                                setUser({ ...user, password: ev.target.value })
                            }
                            placeholder="Password"
                            type="password"
                        />
                        <input
                            onChange={(ev) =>
                                setUser({
                                    ...user,
                                    password_confirmation: ev.target.value,
                                })
                            }
                            placeholder="Password Confirmation"
                            type="password"
                        />
                        <button>Save</button>
                    </form>
                )}
            </div>
        </>
    );
}
