import {registerPlugin} from "@wordpress/plugins";
import App from "./components/App";

registerPlugin(
	'aun-lite-extended-plugin',
	{
		render: App,
	}
);