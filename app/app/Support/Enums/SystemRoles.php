<?php

namespace App\Support\Enums;

/**
 * @important
 * Before modifying this class be sure that all
 * users are removed beacuse can break  the system.
 *
 * @author Nelson Alexandre Mutane
 */
final class SystemRoles
{
    public final const SUPERADMIN = 'Super-Admin';

    public final const ADMIN = 'Admin';

    public final const SUBADMIN = 'Sub-Admin';

    public final const REALSTATEAGENCY = 'Agencia-imobiliaria';

    public final const REALSTATEAGENT = 'Agente-imobiliario';
}
