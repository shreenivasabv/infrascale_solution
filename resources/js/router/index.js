import { createRouter, createWebHistory } from "vue-router"

import Home from "../views/Home.vue"
import Company from "../views/Company.vue"
import Team from "../views/Team.vue"
import Virtualization from "../views/Virtualization.vue"
import StorageBackup from "../views/StorageBackup.vue"
import ServiceDetail from "../views/ServiceDetail.vue"

const routes = [

{
path: "/",
name: "Home",
component: Home
},

{
path: "/company",
component: Company
},

{
path: "/team",
component: Team
},

{
path: "/virtualization",
component: Virtualization
},

{
path: "/storage-backup",
component: StorageBackup
},

{
path: "/service/:slug",
component: ServiceDetail
}

]

const router = createRouter({

history: createWebHistory(),
routes

})

export default router